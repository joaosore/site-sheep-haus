import $ from "jquery";
import moment from "moment";
import { dateHourFormat } from "../utils/time";

let chatListContainer = '';
let chatContainer = '';
let chatReading = {};
var loadingChat = false;
var sendingMessage = false;
var chatApiUrl = '';

$(document).ready(function() {
    chatApiUrl = $('meta[name="api_chats_url"]').attr('content');

    if (window.location.pathname === '/chats') {
        loadChats();
        chatHandlers();
    }

    let miniLists = $("#mini-message-list");

    if (miniLists.length > 0) {
        loadMiniChatList(miniLists[0]);
    }
});

function loadMiniChatList(container) {
    // console.log('container', container);
    // $(container).html('<p>Aqui vai entrar o item</p>');

    const url = chatApiUrl;

    if (!url) {
        return;
    }

    $.ajax({
        method: "GET",
        url: url,
        beforeSend: function() {
            $(container).html(`<p>Carregando conversas...</p>`)
        }
    })
    .done(function( data ) {
        let html = '';
        let toFind = [];
        if (data.mensages) {
            if (data.mensages.length > 0) {

                // $('#chat_length').append(`<span class="badge badge-primary">${data.mensages.length}</span>`);

                data.mensages.map((item, index) => {
                    html += `
                        <div
                            class="message_item"
                            id="message_item_${item.id}"
                            data-recipient="${item.recipient}"
                            data-property="${item.property_id}"
                            data-id="${item.id}"
                            >
                            <h4 class="m_person">${item.user_name}</h4>
                            <p class="m_message">${item.last_mensagem}</p>
                            <div class="m_time">${moment(item.updated_at).format(dateHourFormat)}</div>
                        </div>
                    `;
                })
                
            } else {
                html += `<p>0 conversas</p>`;
            }

            $(container).html(html);
            let objDiv = document.getElementById($(container).attr('id'));
            objDiv.scrollTop = objDiv.scrollHeight;
        }
    });
}

function loadChats() {
    const url = chatApiUrl;

    if (!url) {
        return;
    }

    chatListContainer = $('#chat_list');
    chatContainer = $('#chat_content');

    $.ajax({
        method: "GET",
        url: url,
        beforeSend: function() {
            chatListContainer.html(`<p>Carregando conversas...</p>`)
        }
    })
    .done(function( data ) {
        let html = '';
        let toFind = [];
        if (data.mensages) {
            if (data.mensages.length > 0) {

                $('#chat_length').append(`<span class="badge badge-primary">${data.mensages.length}</span>`);

                data.mensages.map((item, index) => {
                    if (index == 0) {
                        toFind = [item.recipient, item.property_id, item.id];
                    }
                    html += `
                        <div
                            class="message_item"
                            id="message_item_${item.id}"
                            data-recipient="${item.recipient}"
                            data-property="${item.property_id}"
                            data-id="${item.id}"
                            >
                            <h4 class="m_person">${item.user_name}</h4>
                            <p class="m_message">${item.last_mensagem}</p>
                            <div class="m_time">${moment(item.updated_at).format(dateHourFormat)}</div>
                        </div>
                    `;
                })
                
            } else {
                html += `<p>0 conversas</p>`;
            }

            chatListContainer.html(html);
            readChat(toFind[0], toFind[1], toFind[2]);
        }
    });
}

function readChat(recipient, property, message_id) {

    let url = `/api/chats/${recipient}/${property}`

    $.ajax({
        method: "GET",
        url: url,
        beforeSend: function() {
            loadingChat = true;
            chatContainer.html(`<p>Carregando conversa...</p>`)
        }
    })
    .done(function(data) {
        console.log( "Chat Loaded: ", data);

        let html = '';
        if (data.subjects) {
            chatReading = data;

            if (data.subjects.length > 0) {

                data.subjects.map(message => {
                    let messageclasses = (message.from == data.auth_login)
                        ? ['message_line', 'message_line--me']
                        : ['message_line'];

                    html += `
                        <div class="${messageclasses.join(' ')}">
                            <div class="message_column">
                                <div class="message_ballon">
                                    <p class="m_message">${message.mensagem}</p>
                                </div>
                                <span class="m_time">${moment(message.created_at).format(dateHourFormat)}</span>
                            </div>
                        </div>
                    `;
                })
                
            } else {
                html += `<p>Nenhuma conversa</p>`;
            }

            chatContainer.html(html);
            let objDiv = document.getElementById("chat_content");
            objDiv.scrollTop = objDiv.scrollHeight;
        }

        loadingChat = false;
    })

    if (message_id) {
        chatListContainer.find('.message_item').removeClass('message_item--active');
        chatListContainer.find(`#message_item_${message_id}`).addClass('message_item--active');
    }
}

function sendMessage(recipient, property, message) {

    console.log('recipient', recipient)
    console.log('property', property)
    console.log('message', message)

    let url = `/chats/${recipient}/${property}`

    let data = {
        mensagem: message,
        _token: $('meta[name="csrf-token"]').attr('content')
    }
    console.log('data', data)

    $.ajax({
        method: "POST",
        url: url,
        data: data,
        beforeSend: function() {
            sendingMessage = true;
        }
    })
    .done(function(data) {
        $('#text_message').val('');
        readChat(recipient, property);
        sendingMessage = false;
    });
}

function chatHandlers() {
    $(document).on('click', '.message_item', function(e) {
        e.preventDefault();

        if (loadingChat) {
            return;
        }

        var recipient = $(this).data('recipient'),
            property = $(this).data('property'),
            id = $(this).data('id');
        
        if (recipient != undefined && property != undefined && id != undefined) {
            readChat(recipient, property, id);
        }
    })

    // Pega o enter para enviar a mensagem
    $(document).on('keypress', '#text_message', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {                     
            e.preventDefault();

            $("#send_message").click();
        }
    });

    // Clica para enviar a mensagem
    $(document).on('click', '#send_message', function(e) {
        e.preventDefault();

        if (sendingMessage || !chatReading) {
            return;
        }

        var recipient = chatReading.recipient,
            property = chatReading.property,
            message = $('#text_message').val();
        
        if (recipient != undefined && property != undefined && message != undefined) {
            sendMessage(recipient, property, message);
        }
    })
}