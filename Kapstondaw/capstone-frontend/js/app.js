const activeMenuEl = document.querySelector("#active-menu");
const activeConEl = document.querySelector("#active-container");

const menuEl = document.querySelector("#menu");
menuEl.addEventListener("click", () => {
  activeMenuEl.classList.add("show");
});

const closeMenuEl = document.querySelector("#close-menu");
closeMenuEl.addEventListener("click", () => {
  activeMenuEl.classList.remove("show");
});

const loginEl = document.querySelectorAll(".login");
const activeLogin = document.querySelector(".active-login");
const closeLoginEl = document.querySelector(".active-login-close");

loginEl.forEach((login) => {
  login.addEventListener("click", () => {
    console.log("log");
    activeLogin.style.display = "block";

    closeLoginEl.addEventListener("click", () => {
      activeLogin.style.display = "none";
    });
  });
});

const divEl = document.querySelectorAll(".hide");
const newsEl = document.querySelector("#main-news");
const readEl = document.querySelector("#read");

// readEl.addEventListener("click", (e) => {
//   e.preventDefault();
//   divEl.forEach((div) => {
//     div.style.display = "none";
//     newsEl.style.display = "block";

//     const listEl = document.querySelectorAll(".news-list-header");

//     listEl.forEach((list) => {
//       list.addEventListener("click", () => {});
//       $(".hide").show();
//       newsEl.style.display = "none";
//     });
//   });
// });

const subHeaderEl = document.querySelector("#subHeader");
document.addEventListener("scroll", (e) => {
  if (window.screen.width > 375) {
    if (window.scrollY > 310) {
      subHeaderEl.classList.add("scroll");
    } else {
      subHeaderEl.classList.remove("scroll");
    }
  } else {
    subHeaderEl.classList.remove("scroll");
  }
});

const subMenuEl = document.querySelectorAll(".sub-menu");

// subMenuEl.forEach((menu) => {
//   menu.addEventListener("click", () => {
//     $(".hide").show();
//     $("#main-news").hide();
//   });
// });

// * Services
const activeForm = document.querySelectorAll(".active-form");

const serviceBtn = document.querySelectorAll(".service-btn");
const serviceEl = document.querySelectorAll(".active-service");
const closeService = document.querySelectorAll(".active-service-close");
const submitRequest = document.querySelectorAll(".active-service-request");
const successEl = document.querySelector(".active-success");
const forEl = document.querySelectorAll(".for");
const requestorEl = document.querySelectorAll(".requestor");
const requestorName = document.querySelectorAll(".requestorName");

serviceBtn.forEach((btn, i) => {
  btn.addEventListener("click", () => {
    serviceEl[i].style.display = "block";

    closeService[i].addEventListener("click", () => {
      serviceEl[i].style.display = "none";
    });

    forEl.forEach((forService, i) => {
      forService.addEventListener("change", (e) => {
        if (e.target.value === "Someone") {
          requestorEl[i].style.display = "flex";
          requestorName[i].setAttribute("required", "");
        } else {
          requestorEl[i].style.display = "none";
          requestorName[i].removeAttribute("required", "");
        }
      });
    });
  });
});

// TODO it shows the message but it goes to the top to show the message
document.addEventListener("DOMContentLoaded", function () {
  if (successEl) {
    // successEl.style.display = "block";
    setTimeout(function () {
      successEl.style.display = "none";
    }, 2000);
  }
});
// TODO end

// $(".service-btn").on("click", (e) => {
//   e.preventDefault();
//   e.stopPropagation();
//   console.log("logg");
//   $("#active-service-brgyClearance").show();
// });

// $(".active-service-close").on("click", () => {
//   $("#active-service-brgyClearance").hide();
// });

// $(".active-service-request").on("click", (e) => {
//   $(".active-success").show();
//   setTimeout(() => {
//     $(".active-success").hide();
//     // $("#active-service-brgyClearance").hide();
//   }, 5000);
// });

// * End of services
