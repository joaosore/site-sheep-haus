
export function getLocation() {
    if (navigator.geolocation) {
        return navigator.geolocation.getCurrentPosition(showPosition);
    } else {
    //   x.innerHTML = "Geolocation is not supported by this browser.";
        return null;
    }
}