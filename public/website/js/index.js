if (document.querySelector(".loading-div")) {
  const UIloadingDiv = document.querySelector(".loading-div");
  window.addEventListener("load", () => {
    setTimeout(() => {
      UIloadingDiv.remove();
    }, 3000);
  });
}

if (document.querySelector("[data-aos]")) {
  AOS.init();
}

// handle header md

const UIlines = document.querySelector(".lines");
const UImainHeaderMdUlDiv = document.querySelector(".main-header-md-ul-div");

UIlines.addEventListener("click", e => {
  UIlines.classList.toggle("is-active");
  UImainHeaderMdUlDiv.classList.toggle("toggle-main-header-md-ul-div");
});
document.addEventListener("click", e => {
  if (e.target.classList.contains("main-header-md-ul-div")) {
    UIlines.classList.remove("is-active");
    UImainHeaderMdUlDiv.classList.remove("toggle-main-header-md-ul-div");
  }
});

// handle main sidebar drop links
const UIdropLinks = document.querySelectorAll(".drop-a");
for (let dropA of UIdropLinks) {
  dropA.addEventListener("click", e => {
    for (let n of UIdropLinks) {
      n.nextElementSibling.style.height = 0 + "px";
      n.classList.remove("toggle-drop-a");
    }
    let calcHeight = 0;
    let calcParentHeight = 0;
    let calcGrandParentHeight = 0;
    for (let ele of dropA.nextElementSibling.children) {
      calcHeight += ele.children[0].offsetHeight;
    }

    if (dropA.nextElementSibling.offsetHeight === 0) {
      dropA.nextElementSibling.style.height = calcHeight + "px";
      dropA.classList.add("toggle-drop-a");
      if (dropA.parentElement.parentElement.classList.contains("dropped-ul")) {
        for (let parentLi of dropA.parentElement.parentElement.children) {
          calcParentHeight += parentLi.children[0].offsetHeight;
        }
        // if the grand parent element has a dropped-ul class
        // then set the garnd parent height to the dropped ul plus the grand parent direct children height
        dropA.parentElement.parentElement.style.height =
          calcParentHeight + calcHeight + "px";
        // dropA.parentElement.parentElement.parentElement.classList.add('toggle-drop-a');
        dropA.parentElement.parentElement.parentElement.children[0].classList.add(
          "toggle-drop-a"
        );
      }

      if (
        dropA.parentElement.parentElement.parentElement.parentElement.classList.contains(
          "dropped-ul"
        )
      ) {
        for (let grandLi of dropA.parentElement.parentElement.parentElement
            .parentElement.children) {
          calcGrandParentHeight += grandLi.children[0].offsetHeight;
        }
        dropA.parentElement.parentElement.parentElement.parentElement.style.height =
          calcGrandParentHeight + calcHeight + "px";
        dropA.parentElement.parentElement.parentElement.parentElement.parentElement.children[0].classList.add(
          "toggle-drop-a"
        );
      }
    } else {
      dropA.nextElementSibling.style.height = 0 + "px";
      dropA.classList.remove("toggle-drop-a");
      if (dropA.parentElement.parentElement.classList.contains("dropped-ul")) {
        // if the garnd element has a dropped-ul class
        // then set the grand parent height to its direct children height only
        for (let parentLi of dropA.parentElement.parentElement.children) {
          calcParentHeight += parentLi.children[0].offsetHeight;
        }
        dropA.parentElement.parentElement.style.height =
          calcParentHeight + "px";
        dropA.parentElement.parentElement.parentElement.children[0].classList.add(
          "toggle-drop-a"
        );
      }

      if (
        dropA.parentElement.parentElement.parentElement.parentElement.classList.contains(
          "dropped-ul"
        )
      ) {
        for (let grandLi of dropA.parentElement.parentElement.parentElement
            .parentElement.children) {
          calcGrandParentHeight += grandLi.children[0].offsetHeight;
        }
        dropA.parentElement.parentElement.parentElement.parentElement.style.height =
          calcGrandParentHeight + "px";
        dropA.parentElement.parentElement.parentElement.parentElement.parentElement.children[0].classList.add(
          "toggle-drop-a"
        );
      }
    }
    e.preventDefault();
  });
}

// handle scrolling
const UIheaderLg = document.querySelector(".header-lg");
const UIheaderMd = document.querySelector(".header-md");
window.addEventListener("scroll", () => {
  if (window.scrollY >= 200) {
    UIheaderMd.classList.add("toggle-header-md");
    UIheaderLg.classList.add("toggle-header-lg");
  } else {
    UIheaderMd.classList.remove("toggle-header-md");
    UIheaderLg.classList.remove("toggle-header-lg");
  }
});

// home main slider

var mainHomeSLider = new Swiper(".home-main-slider", {
  spaceBetween: 0,
  centeredSlides: false,
  speed: 1600,
  effect: "fade",
  fadeEffect: {
    crossFade: true
  },
  loop: true,
  autoplay: {
    delay: 8000,
    disableOnInteraction: true
  },
  navigation: {
    nextEl: ".home-main-slider-next",
    prevEl: ".home-main-slider-prev"
  },
  pagination: {
    el: ".home-main-slider-pagination",
    clickable: true
  }
});

// banner slider
var bannerSlider = new Swiper(".banner-slider", {
  spaceBetween: 0,
  centeredSlides: false,
  speed: 1000,
  loop: true,
  slidesPerView: 4,
  // spaceBetween: 40,
  breakpoints: {
    1199: {
      slidesPerView: 3
      // spaceBetween: 30,
    },

    991: {
      slidesPerView: 2
      // spaceBetween: 30,
    },
    767: {
      slidesPerView: 1
      // spaceBetween: 30,
    }
  },

  autoplay: {
    delay: 2000,
    disableOnInteraction: false
  }
  // navigation: {
  //   nextEl: '.clients-slider-next',
  //   prevEl: '.clients-slider-prev',
  // },
  // pagination: {
  //   el: '.clients-slider-pagination',
  //   clickable: true
  // }
});

// home gallery section

if (document.querySelector(".home-light-gallery")) {
  lightGallery(document.querySelector(".home-light-gallery"), {
    thumbnail: true
  });
}

// testmonials slider
if (document.querySelector(".testimonials-slick-slider")) {
  $(".testimonials-slick-slider").slick({
    centerMode: true,
    centerPadding: "0",
    slidesToShow: 1,
    infinite: true,
    dots: true,
    arrows: false,
    // autoplay: true,
    autoplaySpeed: 3000,
    focusOnSelect: true,
    responsive: [{
        breakpoint: 992,
        settings: {
          dots: true,
          arrows: false,
          autoplay: true,
          autoplaySpeed: 3000,
          infinite: true,
          centerMode: true,
          // centerPadding: '42px',
          slidesToShow: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          dots: true,
          arrows: false,
          autoplay: true,
          autoplaySpeed: 3000,
          infinite: true,
          centerMode: true,
          // centerPadding: '32px',
          slidesToShow: 1
        }
      }
    ]
  });
}

// faqs section
const UIquestions = document.querySelectorAll(".question-div");
const UIanswers = document.querySelectorAll(".answer-div");
for (let a of UIanswers) {
  a.style.height = 0 + "px";
}
UIquestions.forEach(q => {
  q.addEventListener("click", e => {
    let answerHeight = 0;
    for (let ele of q.nextElementSibling.children) {
      answerHeight += ele.offsetHeight;
    }
    if (e.currentTarget.nextElementSibling.offsetHeight === 0) {
      UIquestions.forEach(qq => {
        qq.nextElementSibling.style.height = 0 + "px";
        qq.parentElement.classList.remove("toggle-q-a-li");
      });
      e.currentTarget.nextElementSibling.style.height = answerHeight + "px";
    } else {
      e.currentTarget.nextElementSibling.style.height = 0 + "px";
    }
    e.currentTarget.parentElement.classList.toggle("toggle-q-a-li");
  });
});

//////////////////////////////////////////////////////////////
if (document.querySelector(".about-drop-div")) {
  const UIaboutDropDivs = document.querySelectorAll(".about-drop-div");
  const UIaboutImages = document.querySelectorAll(".images-wrapper>ul>li");

  // open the first dropped ul
  const firstDropped = UIaboutDropDivs[0].nextElementSibling;
  let initialHeight = 0;
  for (let k of firstDropped.children) {
    initialHeight += k.offsetHeight;
  }
  firstDropped.style.height = initialHeight + "px";
  firstDropped.parentElement.classList.add("toggle-drop-li");
  for (let dropDiv of UIaboutDropDivs) {
    dropDiv.addEventListener("click", e => {
      // reset all the dropped ul height to zero
      for (let ele of UIaboutDropDivs) {
        ele.nextElementSibling.style.height = 0 + "px";
        ele.parentElement.classList.remove("toggle-drop-li");
      }
      // remove all the active image li
      for (let ele of UIaboutImages) {
        ele.classList.remove("active-li-img");
      }
      // calc the height of the dropped ul and set its height
      let calcDroppedHeight = 0;
      for (let h of dropDiv.nextElementSibling.children) {
        calcDroppedHeight += h.offsetHeight;
        if (dropDiv.nextElementSibling.offsetHeight === 0) {
          dropDiv.nextElementSibling.style.height = calcDroppedHeight + "px";
          dropDiv.parentElement.classList.add("toggle-drop-li");
        } else {
          dropDiv.nextElementSibling.style.height = 0 + "px";
          dropDiv.parentElement.classList.remove("toggle-drop-li");
        }
      }
      const toBeActiveImage = document.querySelector(
        `.images-wrapper .${dropDiv.dataset.img}`
      );
      toBeActiveImage.classList.add("active-li-img");
    });
  }
}
//////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////
// counter up section
if (document.querySelector(".counter-number")) {
  $(".counter-number").counterUp({
    delay: 10,
    time: 2000
  });
}
// end counter up section
//////////////////////////////////////////////////////////////////

// handle trim servcie text

function myTrim(UIele) {
  return UIele.textContent.replace(/^\s+|\s+$/gm, " ").trim();
}

function trimText(UIele, charCount) {
  let myString = myTrim(UIele).split(" ");
  return myString.splice(0, charCount).join(" ") + "...";
}

if (document.querySelector(".home-services-section")) {
  const UIservicesText = document.querySelectorAll(
    ".home-services-section .service-text .text p"
  );
  for (let service of UIservicesText) {
    service.textContent = trimText(service, 18);
  }
}

if (document.querySelector(".latest-news-section")) {
  const UIserviceText = document.querySelectorAll(".news-text p");
  for (let service of UIserviceText) {
    service.textContent = trimText(service, 12);
  }
}
if (document.querySelector(".blogs-page")) {
  const newsText = document.querySelectorAll(".news-text p");
  for (let t of newsText) {
    t.textContent = trimText(t, 12);
  }
}

if (document.querySelector(".services-page")) {
  const UIeventsText = document.querySelectorAll(".service-details .text p");
  for (let ele of UIeventsText) {
    ele.textContent = trimText(ele, 12);
  }
}

$(function () {
  $("#datepicker").datepicker();
});

// handle form div
if (document.querySelector(".appointment-form")) {
  const UIformDivs = document.querySelectorAll(".appointment-form .form-div");
  UIformDivs.forEach(d => {
    d.addEventListener("click", e => {
      for (let k of UIformDivs) {
        k.classList.remove("toggle-form-div");
      }
      d.classList.add("toggle-form-div");
    });
  });

  document.addEventListener("click", e => {
    if (!e.target.parentElement.classList.contains("toggle-form-div")) {
      UIformDivs.forEach(ele => {
        ele.classList.remove("toggle-form-div");
      });
    }
  });
}
if (document.querySelector(".service-appointment-form")) {
  const UIformDivs = document.querySelectorAll(
    ".service-appointment-form .form-div"
  );
  UIformDivs.forEach(d => {
    d.addEventListener("click", e => {
      for (let k of UIformDivs) {
        k.classList.remove("toggle-form-div");
      }
      d.classList.add("toggle-form-div");
    });
  });

  document.addEventListener("click", e => {
    if (!e.target.parentElement.classList.contains("toggle-form-div")) {
      UIformDivs.forEach(ele => {
        ele.classList.remove("toggle-form-div");
      });
    }
  });
}

// handle upload property images
if (document.querySelector(".carrers-page")) {
  const UIupload = document.querySelector('input[type="file"]');
  const UIUploadLabel = document.querySelector('label[for="file"]');
  UIupload.addEventListener("change", handleFiles);

  function handleFiles() {
    const files = this.files;
    const fileNames = [];
    for (let i = 0; i < files.length; i++) {
      fileNames.push(files[i].name);
    }
    const fileNamesString = fileNames.join(" & ");
    UIUploadLabel.textContent = fileNamesString;
  }
}
// end handle upload property images

// handle hover on news li
if (document.querySelector(".news-li")) {
  const UInewslinks = document.querySelectorAll(".news-a");
  for (let a of UInewslinks) {
    a.addEventListener("mouseenter", () => {
      a.parentElement.classList.add("toggle-news-card");
    });

    a.addEventListener("mouseleave", () => {
      a.parentElement.classList.remove("toggle-news-card");
    });
  }
}

// handle pagination
if (document.querySelector(".pagination-ul")) {
  const UIpaginationUl = document.querySelector(".pagination-ul");
  for (let page of UIpaginationUl.children) {
    page.children[0].addEventListener("click", e => {
      for (let p of UIpaginationUl.children) {
        p.children[0].classList.remove("active-page");
      }
      const UIprevPage = document.querySelector(
        ".pagination-ul li:first-of-type a"
      );
      const UInextPage = document.querySelector(
        ".pagination-ul li:last-of-type a"
      );
      page.children[0].classList.add("active-page");
      if (
        UIprevPage.classList.contains("active-page") ||
        UInextPage.classList.contains("active-page")
      ) {
        page.children[0].classList.remove("active-page");
      }
      e.preventDefault();
    });
  }
}

////////////////////////////////////////////////
// handle bmi form
////////////////////////////////////////////////
if (document.querySelector('.bmi-form')) {
  const UIformLabels = document.querySelectorAll('.bmi-form .form-div label');
  for (let formLabel of UIformLabels) {
    formLabel.addEventListener('click', toggleFormLabel);
    formLabel.addEventListener('keydown', toggleFormLabelKeydown);
  }

  function toggleFormLabel(e) {
    for (let k of UIformLabels) {
      k.classList.remove('toggle-form-label');
      if (k.children[1].value) {
        k.classList.add('toggle-form-label');
      }
    }
    e.currentTarget.classList.add('toggle-form-label');
  }

  function toggleFormLabelKeydown(e) {
    if (event.keyCode == 9) {
      for (let k of UIformLabels) {
        k.classList.remove('toggle-form-label');
        if (k.children[1].value) {
          k.classList.add('toggle-form-label');
        }
      }
      e.currentTarget.parentElement.nextElementSibling.children[0].classList.add('toggle-form-label');
    }
    if (e.shiftKey && e.keyCode == 9) {
      for (let k of UIformLabels) {
        k.classList.remove('toggle-form-label');
        if (k.children[1].value) {
          k.classList.add('toggle-form-label');
        }
      }
      e.currentTarget.parentElement.previousElementSibling.children[0].classList.add('toggle-form-label');
    }
  }

  // remove the toggle if click any where else outside form label
  // that contains the toggle-form-label class
  document.addEventListener('click', e => {
    if (!e.target.parentElement.classList.contains('toggle-form-label') &&
      !e.target.classList.contains('toggle-form-label')) {
      for (let ele of UIformLabels) {
        ele.classList.remove('toggle-form-label');
        if (ele.children[1].value) {
          ele.classList.add('toggle-form-label');
        }
      }
    }
  });

  const UIformInputs = document.querySelectorAll('.bmi-form .form-div label input');
  for (let formInput of UIformInputs) {
    formInput.addEventListener('change', () => {
      formInput.parentElement.classList.add('toggle-form-label');
    });
  }

  const UIbmiForm = document.querySelector('.bmi-form');
  const UIbmiWeightInput = document.querySelector('.bmi-form .weight-input');
  const UIbmiHeightInput = document.querySelector('.bmi-form .height-input');
  const UIbmiResult = document.querySelector('.bmi-result');
  const UIbmiLoading = document.querySelector('.bmi-loading');
  const UIbmiBody = document.querySelector('.bmi-body');
  const UIbmiOutputValue = document.querySelector('.bmi-result .output .number');
  const UIbmiOutputMessage = document.querySelector('.bmi-result .output .output-message');
  const UIbmiTryAgain = document.querySelector('.bmi-result .try-again');

  UIbmiForm.addEventListener('submit', (e) => {
    const bmi = calculateBMI(UIbmiWeightInput.value, UIbmiHeightInput.value);
    let outputMessage;

    UIbmiForm.classList.add('hide-bmi-form');
    UIbmiResult.classList.add('show-bmi-result');
    setTimeout(() => {
      UIbmiLoading.classList.add('hide-bmi-loading');
      UIbmiBody.classList.add('show-bmi-body');
    }, 3000);
    // console.log(typeof bmi, bmi);
    if (!bmi) {
      UIbmiOutputValue.textContent = 'x_x';
    } else {
      UIbmiOutputValue.textContent = bmi;
    }
    // output message
    if (!bmi)
      outputMessage = '-----';
    else if (bmi < 18.5)
      outputMessage = 'Under Weight';
    else if (18.5 <= bmi && bmi <= 24.99)
      outputMessage = 'Healty Weight';
    else if (25 <= bmi && bmi <= 29.99)
      outputMessage = 'Overweight';
    else if (30 <= bmi && bmi <= 34.99)
      outputMessage = 'Obese Class 1';
    else if (35 <= bmi && bmi <= 39.99)
      outputMessage = 'Obese Class 2';
    else if (40 <= bmi && bmi <= 49.99)
      outputMessage = 'Morbid Obese';
    else if (50 <= bmi)
      outputMessage = 'Super Morbid Obese';

    UIbmiOutputMessage.textContent = outputMessage;

    // try again click
    UIbmiTryAgain.addEventListener('click', () => {
      UIbmiResult.classList.remove('show-bmi-result');
      UIbmiLoading.classList.remove('hide-bmi-loading');
      UIbmiBody.classList.remove('show-bmi-body');
      UIbmiForm.classList.remove('hide-bmi-form');
    })
    e.preventDefault();
  });
}

function calculateBMI(weight, height) {
  return parseFloat((weight / (height / 100 * height / 100)).toFixed(2));
}
////////////////////////////////////////////////////
// end bmi
////////////////////////////////////////////////////