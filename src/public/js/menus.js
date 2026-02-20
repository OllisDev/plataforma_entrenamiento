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
                a.onclick = function (e) {
                    if (menu.link && menu.link !== "#") {
                        e.preventDefault();
                        cargarContenido(menu.link);
                    }
                };
                li.appendChild(a);

                // comprobar que en los menus existen submenus
                if (menu.submenus && Array.isArray(menu.submenus)) {
                    let subUl = document.createElement("ul");
                    menu.submenus.forEach((submenu) => {
                        let subLi = document.createElement("li");
                        let subA = document.createElement("a");
                        subA.href = submenu.link;
                        subA.textContent = submenu.title;
                        subA.onclick = function (e) {
                            e.preventDefault();
                            cargarContenido(submenu.link);
                        };
                        subLi.appendChild(subA);
                        subUl.appendChild(subLi);
                    });
                    li.appendChild(subUl);
                }

                menuList.appendChild(li);
            });
        });
}

// cargar contenido de cada una de las páginas al pulsar en los submenus
function cargarContenido(url) {
    fetch(url)
        .then((response) => response.text())
        .then((html) => {
            const contentDiv = document.getElementById("content");
            contentDiv.innerHTML = html;

            const scripts = contentDiv.querySelectorAll("script");

            scripts.forEach((oldScript) => {
                const newScript = document.createElement("script");

                Array.from(oldScript.attributes).forEach((attr) => {
                    newScript.setAttribute(attr.name, attr.value);
                });

                if (oldScript.innerHTML) {
                    newScript.appendChild(
                        document.createTextNode(oldScript.innerHTML),
                    );
                }

                oldScript.parentNode.replaceChild(newScript, oldScript);
            });
            // ------------------------------------------
        });
}
