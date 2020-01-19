import $ from "jquery";

let chatContainer = '';
var loadingChat = false;

$(document).ready(function() {
    // console.log(window.location.pathname);
    if (window.location.pathname === '/chats') {
        loadChats();
        chatHandlers();
    }
});

function loadChats() {
    const url = $('input#api_chats_url').attr('value');
    // console.log('URL URL ', url);

    if (!url) {
        return;
    }

    chatContainer = $('#chat_list');

    $.ajax({
        method: "GET",
        url: url,
        beforeSend: function() {
            chatContainer.html(`<p>Carregando conversas...</p>`)
        }
    })
    .done(function( data ) {
        // console.log( "Data Loaded: ", data);
        let html = '';
        let toFind = [];
        if (data.mensages) {
            if (data.mensages.length > 0) {

                $('#chat_length').append(`<span class="badge badge-primary">${data.mensages.length}</span>`);

                data.mensages.map((item, index) => {
                    if (index == 0) {
                        toFind = [item.from, item.property_id, item.id];
                    }
                    html += `
                        <div
                            class="message_item"
                            id="message_item_${item.id}"
                            data-from="${item.from}"
                            data-property="${item.property_id}"
                            data-id="${item.id}"
                            >
                            <h4 class="m_person">${item.from}</h4>
                            <p class="m_message">${item.last_mensagem}<p>
                            <div class="m_time">${item.updated_at}</div>
                        </div>
                    `;
                })
                
            } else {
                html += `<p>0 conversas</p>`;
            }

            chatContainer.html(html);
            readChat(toFind[0], toFind[1], toFind[2]);
        }
    });
}

function readChat(recipient, property, message_id) {
    console.log(`#message_item_${message_id}`);

    // loadingChat = true;

    chatContainer.find('.message_item').removeClass('message_item--active');

    chatContainer.find(`#message_item_${message_id}`).addClass('message_item--active');
}

function chatHandlers() {
    $(document).on('click', '.message_item', function(e) {
        e.preventDefault();

        if (loadingChat) {
            return;
        }

        var from = $(this).data('from'),
            property = $(this).data('property'),
            id = $(this).data('id');
        
        if (from != undefined && property != undefined && id != undefined) {
            readChat(from, property, id);
        }
    })
}