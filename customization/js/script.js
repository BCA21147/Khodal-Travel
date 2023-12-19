function setRoadMap(id) {
    var child = document.getElementById('home_page_menu_list').children;
    document.getElementById('home_page_road_map_right').style.width = `${(100 / (child.length)) * id}%`;
    document.getElementById('home_page_road_map_down').style.height = `${(100 / (child.length)) * id}%`;
}
function setRemoveRoadMap() {
    document.getElementById('home_page_road_map_right').style.width = `0%`;
    document.getElementById('home_page_road_map_down').style.height = `0%`;
}

function openMenu() {
    $('#closeMenu').toggleClass("d-none");
    $('#openMenu').toggleClass("d-none");
    $('#MenuList').toggleClass("d-none");
    $('#home_page_menu_list').toggleClass("d-flex");
    $('#user_header').toggleClass("py-2");
}
function closeMenu() {
    $('#openMenu').toggleClass("d-none");
    $('#closeMenu').toggleClass("d-none");
    $('#MenuList').toggleClass("d-none");
    $('#home_page_menu_list').toggleClass("d-flex");
    $('#user_header').toggleClass("py-2");
}
