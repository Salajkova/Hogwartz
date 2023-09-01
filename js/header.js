// Responzivní menu JUPÍ

const menuIcon = document.querySelector(".menu-icon")
const navigation = document.querySelector("nav")
const hamburgerIcon = document.querySelector(".fa-solid")

menuIcon.addEventListener("click", () => {
    if (hamburgerIcon.classList[1] === "fa-bars") {
        hamburgerIcon.classList.remove("fa-bars")
        hamburgerIcon.classList.add("fa-xmark")
        navigation.style.display = "block"
    } else {
        hamburgerIcon.classList.remove("fa-xmark")
        hamburgerIcon.classList.add("fa-bars")
        navigation.style.display = "none" //víceslovné názvy z css se píšou camelCasem
    }
})

