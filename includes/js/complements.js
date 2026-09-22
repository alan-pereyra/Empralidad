// Scroll button show
var navbarBg = document.getElementById('navbar-background');
var scrollToTopButton = document.getElementById('scrollToTopButton');

if(scrollToTopButton){
  window.onscroll = function(){
    if(window.scrollY === 0){
      navbarBg.classList.remove('navbar-scroll');
      scrollToTopButton.classList.remove('img-btn-fixed-show');
    } else {
      navbarBg.classList.add('navbar-scroll');
      scrollToTopButton.classList.add('img-btn-fixed-show');
    }
  }
  window.scrollTo(0, 0);

  // Scroll up animation
  scrollToTopButton.onclick = function() {
    window.scrollTo(0, 0);
  };
}


// Navigation buttons

function openMobileMenu() {
  var bgMenu = document.getElementById('bg-menu-mobile');
  var icon = document.getElementById('btn-menu-nav');
  var menu = document.getElementById('navbarContentMenu');
  var cart = document.getElementById('searchform-woocommerce');
  var searchform = document.getElementById('searchform-mobile');
  var bgSearchform = document.getElementById('bg-searchform-mobile');

  if(searchform){
    if(searchform.style.display != 'none'){
      showSearchBackground();
    }
  }
  if(cart){
    if(cart.style.display != 'none'){
      showWoocommerceCart();
    }
  }

  if (menu.style.visibility === 'visible') {
    icon.classList.add('fa-bars');
    icon.classList.remove('fa-times');
    bgMenu.classList.remove('bg-menu-open');
    menu.style.visibility = 'hidden';
    menu.classList.remove('active');
  } else {
    icon.classList.remove('fa-bars');
    icon.classList.add('fa-times');
    bgMenu.classList.add('bg-menu-open');
    setTimeout(()=>{
      menu.style.visibility = 'visible';
      menu.classList.add('active');
    }, 250)
  }
}

function showSearchBackground() {
  var close = document.getElementById('searchform-close');
  var  icon = document.getElementById('btn-searchform');
  var  text = document.getElementById('span-searchform');
  var menu = document.getElementById('navbarContentMenu');
  var cart = document.getElementById('searchform-woocommerce');
  var searchform = document.getElementById('searchform-mobile');
  var bgSearchform = document.getElementById('bg-searchform-mobile');

  if(menu.style.visibility === 'visible'){
    openMobileMenu();
  }
  if(cart){
    if(cart.style.display != 'none'){
      showWoocommerceCart();
    }
  }

  if(searchform.style.display != 'none'){
    icon.classList.add('fa-search');
    icon.classList.remove('fa-times');
    close.classList.add('fa-search');
    close.classList.remove('fa-times');
    text.classList.add('d-block');
    text.classList.remove('d-none');
    bgSearchform.style.padding = '0vh 0 0 0';
    searchform.style.display = 'none';
  }else{
    icon.classList.remove('fa-search');
    icon.classList.add('fa-times');
    close.classList.remove('fa-search');
    close.classList.add('fa-times');
    text.classList.remove('d-block');
    text.classList.add('d-none');
    bgSearchform.style.padding = '200vh 0 0 0';
    setTimeout(()=>{
      searchform.style.display = 'block';
    }, 250)
  }
}

function showWoocommerceCart() {
  var icon = document.getElementById('btn-woocommerce-cart');
  var text = document.getElementById('span-woocommerce-cart');
  var counter = document.getElementById('span-woocommerce-counter');
  var navbar =  document.querySelector("nav.navbar");
  var menu = document.getElementById('navbarContentMenu');
  var cart = document.getElementById('searchform-woocommerce');
  var searchform = document.getElementById('searchform-mobile');
  var bgSearchform = document.getElementById('bg-searchform-mobile');

  if(searchform){
    if(searchform.style.display != 'none'){
      showSearchBackground();
    }
  }
  if(menu.style.visibility === 'visible'){
    openMobileMenu();
  }
  if(cart.style.display != 'none'){
    icon.classList.add('fa-shopping-cart');
    icon.classList.remove('fa-times');
    text.classList.add('d-block');
    text.classList.remove('d-none');
    if(counter){
      counter.classList.add('visible');
      counter.classList.remove('invisible');
    }
    bgSearchform.style.padding = '0vh 0 0 0';
    cart.style.display = 'none';
  }else{
    icon.classList.remove('fa-shopping-cart');
    icon.classList.add('fa-times');
    text.classList.remove('d-block');
    text.classList.add('d-none');
    if(counter){
      counter.classList.remove('visible');
      counter.classList.add('invisible');
    }
    bgSearchform.style.padding = '200vh 0 0 0';
    setTimeout(()=>{
      cart.style.display = 'block';
    }, 250)
  }
}

// woocomerce columns
function initWooColumns() {
  var wooFeaturedProducts = document.querySelector('#woo_featured_products ul');
  if(wooFeaturedProducts){
    wooFeaturedProducts.classList.remove('columns-3');
  }
  var columns4 = document.querySelector('.products .columns-4');
  if(columns4){
    columns4.classList.add('columns-x');
  }
}
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initWooColumns);
} else {
  initWooColumns();
}

// Carousel fade
var item = [];
item[1] = document.getElementById('carousel-item-1');
item[2] = document.getElementById('carousel-item-2');
item[3] = document.getElementById('carousel-item-3');
bodyBG = document.getElementById('emp-background-image');
var itemNumber = 1;

function carouselItemNext() {
  item[itemNumber].classList.remove('active');
  bodyBG.classList.remove('emp-background-image'+itemNumber);
  if(itemNumber < 3){
    itemNumber++;
  } else{
    itemNumber = 1;
  }
  if(!(item[itemNumber])){
    if(itemNumber < 3){
      itemNumber++;
    } else{
      itemNumber = 1;
    }
  }
  bodyBG.classList.add('emp-background-image'+itemNumber);
  item[itemNumber].classList.add('active');
}
function carouselItemPrev() {
  item[itemNumber].classList.remove('active');
  bodyBG.classList.remove('emp-background-image'+itemNumber);
  if(itemNumber > 1){
    itemNumber--;
  } else{
    itemNumber = 3;
  }
  if(!(item[itemNumber])){
    if(itemNumber > 1){
      itemNumber--;
    } else{
      itemNumber = 3;
    }
  }
  item[itemNumber].classList.add('active');
  bodyBG.classList.add('emp-background-image'+itemNumber);
}

// Sliders front page
function slidersFrontpage(){
  var empSliders = document.getElementById('emp-sliders');
  if (!empSliders) return;

  var sliderUl = empSliders.querySelector('ul');
  if (!sliderUl) return;

  var slides = sliderUl.querySelectorAll('li');
  var totalSliders = slides.length;
  if (totalSliders <= 1) return;

  var prevBtn = document.getElementById('emp-slider-prev');
  var nextBtn = document.getElementById('emp-slider-next');

  if (prevBtn) prevBtn.classList.remove('disabled');
  if (nextBtn) nextBtn.classList.remove('disabled');

  var actualSlider = 0;
  var autoTimer = null;
  var defaultDelay = 4500;
  var readingDelay = 8000;

  function stopTimer(){
    if (autoTimer) {
      clearTimeout(autoTimer);
      autoTimer = null;
    }
  }

  function startTimer(delay){
    stopTimer();
    autoTimer = setTimeout(function(){
      nextSlider(false);
    }, delay || defaultDelay);
  }

  function goToSlide(index, isUserAction){
    if (index < 0) {
      index = totalSliders - 1;
    } else if (index >= totalSliders) {
      index = 0;
    }
    actualSlider = index;
    stopTimer();

    sliderUl.style.transform = 'translateX(-' + (actualSlider * 100) + '%)';

    startTimer(isUserAction ? readingDelay : defaultDelay);
  }

  function nextSlider(isUserAction){
    goToSlide(actualSlider + 1, isUserAction);
  }

  function prevSlider(isUserAction){
    goToSlide(actualSlider - 1, isUserAction);
  }

  if (prevBtn) {
    prevBtn.onclick = function(e){
      e.preventDefault();
      e.stopPropagation();
      prevSlider(true);
    };
  }

  if (nextBtn) {
    nextBtn.onclick = function(e){
      e.preventDefault();
      e.stopPropagation();
      nextSlider(true);
    };
  }

  // Pausar al pasar el mouse por encima en PC
  empSliders.addEventListener('mouseenter', stopTimer, false);
  empSliders.addEventListener('mouseleave', function(){
    startTimer(defaultDelay);
  }, false);

  // Soporte táctil para móvil (Touch swipe)
  var touchStartX = 0;
  var touchEndX = 0;

  empSliders.addEventListener('touchstart', function(e){
    stopTimer();
    if (e.changedTouches && e.changedTouches.length > 0) {
      touchStartX = e.changedTouches[0].screenX;
    }
  }, { passive: true });

  empSliders.addEventListener('touchend', function(e){
    if (e.changedTouches && e.changedTouches.length > 0) {
      touchEndX = e.changedTouches[0].screenX;
      var diff = touchStartX - touchEndX;
      if (Math.abs(diff) > 40) {
        if (diff > 0) {
          nextSlider(true);
        } else {
          prevSlider(true);
        }
      } else {
        startTimer(readingDelay);
      }
    }
  }, { passive: true });

  // Iniciar carrusel automático
  sliderUl.style.transform = 'translateX(0%)';
  startTimer(defaultDelay);
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', slidersFrontpage);
} else {
  slidersFrontpage();
}

// Categories carousel front page
function categoriesCarousel() {
  var carousel = document.getElementById('emp-categories-carousel');
  if (!carousel) return;

  var track = carousel.querySelector('.emp-categories-track');
  var viewport = carousel.querySelector('.emp-categories-viewport');
  if (!track || !viewport) return;

  var prevBtn = document.getElementById('emp-categories-prev');
  var nextBtn = document.getElementById('emp-categories-next');

  var autoTimer = null;
  var defaultDelay = 4500;
  var readingDelay = 8000;
  var actualIndex = 0;

  function stopTimer() {
    if (autoTimer) {
      clearTimeout(autoTimer);
      autoTimer = null;
    }
  }

  function startTimer(delay) {
    stopTimer();
    autoTimer = setTimeout(function() {
      nextStep(false);
    }, delay || defaultDelay);
  }

  function isMobile() {
    return window.innerWidth <= 768;
  }

  function getMaxIndex() {
    if (isMobile()) {
      var slides = track.querySelectorAll('.emp-categories-slide');
      return Math.max(0, slides.length - 1);
    } else {
      var items = track.querySelectorAll('.emp-category-item');
      if (items.length === 0) return 0;
      var itemWidth = items[0].getBoundingClientRect().width;
      var vpWidth = viewport.getBoundingClientRect().width;
      var visibleItems = Math.max(1, Math.round(vpWidth / itemWidth));
      return Math.max(0, items.length - visibleItems);
    }
  }

  function goToIndex(index, isUserAction) {
    var maxIndex = getMaxIndex();
    if (maxIndex <= 0) {
      track.style.transform = 'translateX(0px)';
      stopTimer();
      if (prevBtn) prevBtn.style.visibility = 'hidden';
      if (nextBtn) nextBtn.style.visibility = 'hidden';
      return;
    } else {
      if (!isMobile()) {
        if (prevBtn) prevBtn.style.visibility = 'visible';
        if (nextBtn) nextBtn.style.visibility = 'visible';
      }
    }

    if (index < 0) {
      index = maxIndex;
    } else if (index > maxIndex) {
      index = 0;
    }
    actualIndex = index;
    stopTimer();

    if (isMobile()) {
      track.style.transform = 'translateX(-' + (actualIndex * 100) + '%)';
    } else {
      var items = track.querySelectorAll('.emp-category-item');
      if (items[actualIndex]) {
        var offset = actualIndex * items[0].getBoundingClientRect().width;
        track.style.transform = 'translateX(-' + offset + 'px)';
      }
    }

    startTimer(isUserAction ? readingDelay : defaultDelay);
  }

  function nextStep(isUserAction) {
    goToIndex(actualIndex + 1, isUserAction);
  }

  function prevStep(isUserAction) {
    goToIndex(actualIndex - 1, isUserAction);
  }

  if (prevBtn) {
    prevBtn.onclick = function(e) {
      e.preventDefault();
      e.stopPropagation();
      prevStep(true);
    };
  }

  if (nextBtn) {
    nextBtn.onclick = function(e) {
      e.preventDefault();
      e.stopPropagation();
      nextStep(true);
    };
  }

  // Pausa en PC al pasar el mouse por encima
  carousel.addEventListener('mouseenter', stopTimer, false);
  carousel.addEventListener('mouseleave', function() {
    startTimer(defaultDelay);
  }, false);

  // Soporte tactil para movil (Touch swipe)
  var touchStartX = 0;
  var touchEndX = 0;

  carousel.addEventListener('touchstart', function(e) {
    stopTimer();
    if (e.changedTouches && e.changedTouches.length > 0) {
      touchStartX = e.changedTouches[0].screenX;
    }
  }, { passive: true });

  carousel.addEventListener('touchend', function(e) {
    if (e.changedTouches && e.changedTouches.length > 0) {
      touchEndX = e.changedTouches[0].screenX;
      var diff = touchStartX - touchEndX;
      if (Math.abs(diff) > 40) {
        if (diff > 0) {
          nextStep(true);
        } else {
          prevStep(true);
        }
      } else {
        startTimer(readingDelay);
      }
    }
  }, { passive: true });

  // Reset al redimensionar ventana
  window.addEventListener('resize', function() {
    goToIndex(0, false);
  });

  // Iniciar carrusel
  goToIndex(0, false);
}

function initCategoriesStyle2() {
  var container = document.getElementById('emp-categories-style-2');
  if (!container) return;

  var isDown = false;
  var startX = 0;
  var scrollLeft = 0;
  var hasDragged = false;

  container.addEventListener('mousedown', function(e) {
    if (e.button !== 0) return;
    isDown = true;
    hasDragged = false;
    container.classList.add('is-dragging');
    startX = e.pageX - container.offsetLeft;
    scrollLeft = container.scrollLeft;
  });

  window.addEventListener('mouseup', function() {
    if (isDown) {
      isDown = false;
      container.classList.remove('is-dragging');
    }
  });

  container.addEventListener('mouseleave', function() {
    if (isDown) {
      isDown = false;
      container.classList.remove('is-dragging');
    }
  });

  container.addEventListener('mousemove', function(e) {
    if (!isDown) return;
    e.preventDefault();
    var x = e.pageX - container.offsetLeft;
    var walk = (x - startX) * 1.4;
    if (Math.abs(x - startX) > 4) {
      hasDragged = true;
    }
    container.scrollLeft = scrollLeft - walk;
  });

  var links = container.querySelectorAll('a');
  for (var i = 0; i < links.length; i++) {
    links[i].addEventListener('click', function(e) {
      if (hasDragged) {
        e.preventDefault();
        e.stopPropagation();
        hasDragged = false;
      }
    });
  }
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', function() {
    categoriesCarousel();
    initCategoriesStyle2();
  });
} else {
  categoriesCarousel();
  initCategoriesStyle2();
}

// Search woocommerce products by custom filters
function initWooPriceFilter() {
  var maxPriceDesktopRangeInput = document.getElementById('emp-range-price-desktop');
  var maxPriceDesktopSmall = document.getElementById('emp-small-price-desktop');
  var deleteWooProductFiltersBtnDesktop = document.getElementById('emp-delete-woo-product-filter-desktop');

  function formatCurrency(val) {
    var num = parseFloat(val);
    if (isNaN(num)) return val;
    return '$ ' + Math.round(num).toLocaleString('es-AR');
  }

  function updateProgress(slider) {
    var min = parseFloat(slider.min) || 0;
    var max = parseFloat(slider.max) || 100;
    var val = parseFloat(slider.value) || min;
    var percent = max > min ? ((val - min) / (max - min)) * 100 : 100;
    slider.style.setProperty('--progress', percent + '%');
  }

  if (maxPriceDesktopRangeInput){
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);

    maxPriceDesktopRangeInput.addEventListener("input", function(e){
      if (maxPriceDesktopSmall) {
        maxPriceDesktopSmall.innerHTML = formatCurrency(this.value);
      }
      updateProgress(this);
      e.preventDefault();
      e.stopPropagation();
    });

    if (urlParams.get('max_price') == null){
      if (maxPriceDesktopRangeInput.max) {
        maxPriceDesktopRangeInput.value = maxPriceDesktopRangeInput.max;
      }
    } else {
      maxPriceDesktopRangeInput.value = urlParams.get('max_price');
    }

    if (maxPriceDesktopSmall) {
      maxPriceDesktopSmall.innerHTML = formatCurrency(maxPriceDesktopRangeInput.value);
    }
    updateProgress(maxPriceDesktopRangeInput);

    if (deleteWooProductFiltersBtnDesktop) {
      if (urlParams.get('max_price') || urlParams.get('s')){
        deleteWooProductFiltersBtnDesktop.classList.add('active');
      } else {
        deleteWooProductFiltersBtnDesktop.classList.remove('active');
      }
    }
  }
}
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initWooPriceFilter);
} else {
  initWooPriceFilter();
}
function empGetRangeUrl(e){
  let empUrl= window.location.href.split('?')[0];

  // empUrl = empUrl.substring(empUrl.lastIndexOf("."), empUrl.lastIndexOf("page"));
  console.log(empUrl);

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);

  if( urlParams.get('s')){
    url = window.location.href =  empUrl+'?s='+urlParams.get('s')+'&post_type=product&max_price='+e;
  }else{
    url = window.location.href =  empUrl+'?max_price='+e;
  }

  return url;
}

var empWooSearch = document.getElementById('emp-woo-search');
if(empWooSearch){
  let empUrl= window.location.href.split('?')[0];

  // empUrl = empUrl.substring(empUrl.lastIndexOf("."), empUrl.lastIndexOf("page"));
  console.log(empUrl);

  empWooSearch.addEventListener('submit', function(e) {
    e.preventDefault();

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);

    let textForm = document.getElementById("emp-woo-search-text").value;

    if( urlParams.get('max_price')){
      url = window.location.href =  empUrl+'?s='+textForm+'&post_type=product&max_price='+urlParams.get('max_price');
    }else{
      url = window.location.href =  empUrl+'?s='+textForm+'&post_type=product';
    }

    return url;
  });
}
function empDeleteFilters(){
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);

  url = window.location.href =  window.location.href.split('?')[0];
}

var empWooBtnFilters = document.getElementById('emp-button-woo-filters');
var empWooFilterArea = document.getElementById('emp-woo-filter-area');
var empWooBtnFilterCloseArea = document.getElementById('emp-woo-filter-area-close-btn');

if (empWooBtnFilters) {
  empWooBtnFilters.addEventListener("click", function(e){
    empWooFilterArea.classList.add('active');
    e.preventDefault();
    e.stopPropagation();
  })
  empWooBtnFilterCloseArea.addEventListener("click", function(e){
    empWooFilterArea.classList.remove('active');
    e.preventDefault();
    e.stopPropagation();
  })
}

// Add description to woocommerce-bacs-bank-details

var wooBankDetails = document.querySelector('.wc-bacs-bank-details-heading');
if (wooBankDetails) {
  let wooBankAliasDetail = document.querySelector('.wc-bacs-bank-details-account-name');
  let wooBankDetailItems = document.querySelector('.wc-bacs-bank-details.order_details.bacs_details');

  let title = 'Acreditar compra:';
  let h2 = document.createElement("h2");
  h2.classList.add('emp');
  h2.innerHTML = title;

  let text = 'Para <b>Completar la compra</b> ingresá el "Numero de cuenta" en donde diga CBU o CVU desde tu home banking o a través de mercado pago. Ingresá el monto exacto que figura más arriba. Una vez realizado el pago envianos un mensaje con el comprobante';
  let p = document.createElement("p");
  p.innerHTML = text;

  wooBankDetails.parentNode.insertBefore(h2, wooBankDetails);
  wooBankDetails.parentNode.insertBefore(p, wooBankDetails);

  wooBankAliasDetail.innerHTML = wooBankAliasDetail.innerHTML.split(':').join("");
  wooBankAliasDetail.innerHTML = 'Alias: '+wooBankAliasDetail.innerHTML;

  text = 'Para <b>Informar la compra</b> tocá el ícono de WhatsApp, mandanos un mansaje con el número del pedido y el comprobante de transferencia';
  p = document.createElement("p");
  p.innerHTML = text;
  wooBankDetailItems.parentNode.insertBefore(p, wooBankDetailItems.nextSibling);
}

// Countdown
function updateTimer() {
  var timer = document.getElementById("timer");
  future  = Date.parse("September 9, 2024 20:00:00");
  now     = new Date();
  diff    = future - now;

  days  = Math.floor( diff / (1000*60*60*24) );
  hours = Math.floor( diff / (1000*60*60) );
  mins  = Math.floor( diff / (1000*60) );
  secs  = Math.floor( diff / 1000 );

  d = days;
  h = hours - days  * 24;
  m = mins  - hours * 60;
  s = secs  - mins  * 60;

  timer.innerHTML =
      '<div>' + d + '<span>Día</span></div>' +
      '<div>' + h + '<span>Horas</span></div>' +
      '<div>' + m + '<span>Minutos</span></div>' +
      '<div>' + s + '<span>Segundos</span></div>' ;
}
function initTimer() {
  if(document.getElementById("timer")){
    setInterval(updateTimer, 1000);
  }
}
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initTimer);
} else {
  initTimer();
}

// Quantity Stepper (+ / -)
document.addEventListener('click', function(e) {
  var btn = e.target.closest('.emp-qty-btn');
  if (!btn) return;
  var container = btn.closest('.quantity');
  if (!container) return;
  var input = container.querySelector('input.qty');
  if (!input) return;

  var currentVal = parseFloat(input.value) || 1;
  var step = parseFloat(input.step) || 1;
  var min = input.min !== '' ? parseFloat(input.min) : 1;
  var max = input.max !== '' ? parseFloat(input.max) : Infinity;

  if (btn.classList.contains('emp-qty-minus')) {
    if (currentVal > min) {
      input.value = Math.max(min, currentVal - step);
      input.dispatchEvent(new Event('change', { bubbles: true }));
    }
  } else if (btn.classList.contains('emp-qty-plus')) {
    if (currentVal < max) {
      input.value = Math.min(max, currentVal + step);
      input.dispatchEvent(new Event('change', { bubbles: true }));
    }
  }
  e.preventDefault();
});

// Cart animation and counter handling
(function() {
  function updateCartState(count) {
    var mobileCart = document.getElementById('btn-woocommerce-cart');
    var desktopCart = document.querySelector('a.fa-shopping-cart.show-desktop');
    var mobileCounter = document.getElementById('span-woocommerce-counter');
    var desktopCounter = document.querySelector('.woo-counter-cart-number-desktop');
    var mobileCountDiv = document.getElementById('mini-cart-count-footer');
    var desktopCountDiv = document.getElementById('mini-cart-count');

    var num = parseInt(count, 10);
    if (isNaN(num)) {
      if (mobileCountDiv && mobileCountDiv.textContent.trim() !== '') {
        num = parseInt(mobileCountDiv.textContent.trim(), 10) || 0;
      } else if (desktopCountDiv && desktopCountDiv.textContent.trim() !== '') {
        num = parseInt(desktopCountDiv.textContent.trim(), 10) || 0;
      } else {
        num = 0;
      }
    }

    if (num > 0) {
      if (mobileCart) mobileCart.classList.add('has-items');
      if (desktopCart) desktopCart.classList.add('has-items');
      if (mobileCounter) {
        mobileCounter.classList.remove('d-none');
        mobileCounter.style.display = '';
      }
      if (desktopCounter) {
        desktopCounter.classList.remove('d-none');
        desktopCounter.style.display = '';
      }
    } else {
      if (mobileCart) mobileCart.classList.remove('has-items');
      if (desktopCart) desktopCart.classList.remove('has-items');
      if (mobileCounter) mobileCounter.classList.add('d-none');
      if (desktopCounter) desktopCounter.classList.add('d-none');
    }
  }

  function triggerCartPop() {
    var mobileCart = document.getElementById('btn-woocommerce-cart');
    var desktopCart = document.querySelector('a.fa-shopping-cart.show-desktop');

    [mobileCart, desktopCart].forEach(function(btn) {
      if (!btn) return;
      btn.classList.remove('emp-cart-pop');
      void btn.offsetWidth;
      btn.classList.add('emp-cart-pop');
      setTimeout(function() {
        btn.classList.remove('emp-cart-pop');
      }, 650);
    });
  }

  function initCartListeners() {
    if (window.jQuery) {
      window.jQuery(document.body).on('added_to_cart', function(event, fragments, cart_hash, $button) {
        triggerCartPop();
        var newCount = null;
        if (fragments) {
          var temp = document.createElement('div');
          if (fragments['#mini-cart-count']) {
            temp.innerHTML = fragments['#mini-cart-count'];
            newCount = parseInt(temp.textContent.trim(), 10);
          } else if (fragments['#mini-cart-count-footer']) {
            temp.innerHTML = fragments['#mini-cart-count-footer'];
            newCount = parseInt(temp.textContent.trim(), 10);
          }
        }
        setTimeout(function() {
          updateCartState(newCount);
        }, 50);
      });

      window.jQuery(document.body).on('wc_fragments_refreshed wc_fragments_loaded removed_from_cart', function() {
        setTimeout(function() {
          updateCartState();
        }, 50);
      });
    }

    updateCartState();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCartListeners);
  } else {
    initCartListeners();
  }
})();
