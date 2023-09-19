// var i=0;
// var images = ["images/etageres-medicaments-pharmacie.jpg",
//                "images/gros-plan-livreur-donnant-colis-au-client (1).jpg",
//                 "images/capsules-colorees-stethoscope-masque-trousses-premiers-soins-fond-blanc.jpg",
//                 "images/pharmacien-afro-americain-travaillant-pharmacie-pharmacie-hopital-soins-sante-africains (1).jpg",
//                 "images/homme-africain-recevant-colis-employe-du-service-livraison.jpg",
//                 "images/vue-face-du-controle-medical-pour-concept-covid19.jpg"];
// var Time = 3000;
// function changeImg(){
//     document.slide.src = images[i];
//     if(i<images.length-1){
//         i++;
//     }else{
//         i=0;
//     }
//     setTimeout("changeImg()",Time);
// }
// window.onload = changeImg;

var typed= new Typed(".text", {
    String:["frontend Developer" , "youtuber" , "web "],
    typeSpeed: 100,
    backSpeed: 100,
    backDelay: 1000,
    loop: true
});

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });