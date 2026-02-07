window.addEventListener("load", comenzar, false);

function comenzar() {
    cargarMenus();
}

function cargarMenus() {
    fetch("json/menus.json")
        .then((response) => response.json())
        .then((menus) => {
            let menuList = document.getElementById("menu-list");
            menus.forEach((menu) => {
                let li = document.createElement("li");
                let a = document.createElement("a");
                a.href = menu.link;
                a.textContent = menu.title;
                li.appendChild(a);

                // comprobar que en los menus existen submenus
                if (menu.submenus && Array.isArray(menu.submenus)) {
                    let subUl = document.createElement("ul");
                    menu.submenus.forEach((submenu) => {
                        let subLi = document.createElement("li");
                        let subA = document.createElement("a");
                        subA.href = submenu.link;
                        subA.textContent = submenu.title;
                        subLi.appendChild(subA);
                        subUl.appendChild(subLi);
                    });
                    li.appendChild(subUl);
                }

                menuList.appendChild(li);
            });
        });
}
