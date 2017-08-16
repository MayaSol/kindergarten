    var menu_toggle = document.querySelector(".kindergarten-menu-toggle");
    var header = document.querySelector(".site-header");


      header.classList.add("site-header--closed");


    menu_toggle.addEventListener("click", function(event) {
        event.preventDefault();
        if (header.classList.contains("site-header--closed"))
        {
            header.classList.remove("site-header--closed");
            header.classList.add("site-header--opened");
        }
        else
        {
            header.classList.remove("site-header--opened");
            header.classList.add("site-header--closed");
        }
    });
