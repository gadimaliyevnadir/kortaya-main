const week_days_items = document.getElementsByClassName("week_days_items");
const week_cards_for_items_box = document.querySelectorAll(".week_cards_for_items_box");
const week_name_inside = document.getElementById("week_name_inside");
const week_names = ["Monday", "Tuesday", "wednesday", "Thursday", "Friday", "Saturday", "Sunday"];


[...week_days_items].forEach((item, index) => {
	[...week_cards_for_items_box].forEach((item, i) => {
		i !== 0 ? item.style.display = "none" : '';
	})
	item.addEventListener("click", () => {
		week_name_inside.innerHTML = `Only ${week_names[index]}`;

		[...week_days_items].forEach((dayItem) => {
			dayItem.classList.remove("active");
		});

		[...week_cards_for_items_box].forEach((item, index) => {
			item.style.display = "none";
		})

		item.classList.add("active");
		week_cards_for_items_box[index].style.display = "flex";
	})
})

const describtion_box_button = document.getElementsByClassName("describtion_box_button");
const describtion_box_desc = document.getElementsByClassName("describtion_box_desc");

[...describtion_box_button].forEach((item, index) => {
	item.addEventListener("click", () => {
		describtion_box_desc[index].classList.toggle("auto_height");
		let describtion_box_html = item.querySelector(".describtion_box_html");
		describtion_box_desc[index].classList.contains("auto_height") ? describtion_box_html.innerHTML = "Close" : describtion_box_html.innerHTML = "Show more";
	})
})

const single_review = document.querySelectorAll(".single-review .col-12.d-flex");
const single_review_button = document.getElementsByClassName("single-review-button");
const reviewsPerPage = 10;
let currentPage = 1;

function hideReviews() {
	// Remove d-flex and add d-none to hide the reviews
	single_review.forEach(item => {
		item.classList.remove('d-flex');
		item.classList.add('d-none');
	});
}
hideReviews();

function showReviews(page) {
	const startIndex = (page - 1) * reviewsPerPage;
	const endIndex = startIndex + reviewsPerPage;


	// Show the reviews for the current page
	for (let i = startIndex; i < endIndex && i < single_review.length; i++) {
		// Remove d-none and add d-flex to show the reviews
		single_review[i].classList.remove('d-none');
		single_review[i].classList.add('d-flex');
	}
}

showReviews(currentPage);

[...single_review_button].forEach(item => {
	item.addEventListener('click', function () {
		currentPage++;
		showReviews(currentPage);
		if (currentPage * 10 >= single_review.length) {
			item.disabled = true;
			item.parentElement.style.border = "1px solid #999999";
		}
	});
})

const alphabets = document.querySelectorAll(".alphabet_box .alphabet");
const alphabets_list = document.querySelectorAll(".brand_inner_list	 .alphabet_company_list");

[...alphabets].forEach((item, index) => {
	item.addEventListener("mouseover", () => {
		[...alphabets_list].forEach(item => item.style.display = "none");
		alphabets_list[index].style.display = "block";
	})
})

const detail_logo = document.getElementById("detail_logo");
const sticky = detail_logo != null ? detail_logo.offsetTop : null;
window.addEventListener("scroll", function () {
	if (window.pageYOffset + 200 >= 700) {
		detail_logo?.classList.add("sticky-section", "container-sticky-new");
	} else {
		detail_logo?.classList.remove("sticky-section", "container-sticky-new");
	}
});


const swiperDetails = new Swiper('.logo_slider_swiper .swiper-container', {
	effect: 'fade',
	loop: true,
	fadeEffect: {
		crossFade: true
	},
	autoplay: {
		delay: 2000,
	},
	speed: 800,
	disableOnInteraction: false,
});
const swiperDetails2 = new Swiper('.height-mobile .swiper', {
	effect: 'fade',
	loop: true,
	fadeEffect: {
		crossFade: true
	},
	autoplay: {
		delay: 2000,
	},
	speed: 800,
	disableOnInteraction: false,
});

const close_swiper = document.getElementsByClassName("close_swiper");

[...close_swiper].forEach(item => {
	item.addEventListener("click", () => {
		item.parentElement.style.display = "none"
	})
})

const stars_count = document.querySelectorAll(".review_stars .fa.fa-star");
const ratings_review_point = document.querySelectorAll(".ratings_review_point");

[...stars_count].forEach((item, index) => {
	item.style.color = "black"
	item.addEventListener("mouseenter", () => {
		[...stars_count].forEach((ti, tin) => {
			ti.style.color = "black";
		});
		[...stars_count].forEach((ti, tin) => {
			tin <= index ? ti.style.color = "#FFD700" : "";
		})
	})
	item.addEventListener("mouseleave", () => {
		[...stars_count].forEach((ti, tin) => {
			tin <= index ? ti.style.color = "#FFD700" : "";
			tin === index ? ratings_review_point[0].value = index + 1 : "";
		})
	})
})

const order_menu = document.querySelectorAll(".order_tracking_menu .order_tracking_menu_list");
const order_tracking_date_box = document.querySelectorAll(".order_tracking_date_box");
const order_history_active_check = document.querySelectorAll(".order_history_active_check");

order_tracking_date_box.forEach(item => {
	item.getAttribute("data-assign") === 'failed' ? item.style.display = "none" : item.style.display = "flex";
});

[...order_history_active_check].forEach(item => {
	item.getAttribute("data-assign") === 'failed' ? item.style.display = "none" : item.style.display = "block";
});

[...order_menu].forEach((item, index) => {
	item.addEventListener("click", (e) => {
		[...order_menu].forEach(item_second => {
			item_second.classList.remove("active_border");
		})
		item.classList.add("active_border");
	})
})

if (order_tracking_date_box) {
	let controlHref = window.location.href.split("?")[1];
	if (controlHref === "type=failed") {

		order_tracking_date_box.forEach(item => {
			item.getAttribute("data-assign") === 'failed' ? item.style.display = "flex" : item.style.display = "none";
		});

	}
}


let simple = new Datepicker('#simple');
let simple2 = new Datepicker('#simple2');

let today = new Date();
let dd = String(today.getDate()).padStart(2, '0');
let mm = String(today.getMonth() + 1).padStart(2, '0');
let yyyy = today.getFullYear();
let todayDate = yyyy + '-' + mm + '-' + dd;


simple.value = todayDate;

let firstDayOfYear = yyyy + '-01-01';

simple2.value = firstDayOfYear;

const check_register = document.getElementById("check_register");
const postalCode = document.getElementsByClassName("postalCode");


if (check_register) {
	check_register.addEventListener("click", () => {
		postalCode[0].disabled = check_register.checked;
	})
}

const checkbox_adress_check_all = document.getElementById("checkbox_adress_check_all");
const checkbox_adress_check_one = document.getElementsByClassName("checkbox_adress_check_one");

if (checkbox_adress_check_all) {
	checkbox_adress_check_all.addEventListener("change", (arg) => {
		[...checkbox_adress_check_one].forEach(item =>
			item.checked = checkbox_adress_check_all.checked
		)
	})
}

const letterMobile = document.getElementsByClassName("letterMobile");
const letterMobileBox_item = document.getElementsByClassName("letterMobileBox");

if (letterMobile) {
	[...letterMobile].forEach((item, index) => {
		item.classList.remove("active")
		item.addEventListener("click", () => {
			scrollToLetter(item.innerHTML);

			[...letterMobile].forEach((item) => {
				item.classList.remove("active")
			})

			Array.from(letterMobileBox_item).forEach(item => item.style.display = "none")

			item.classList.add("active");
			letterMobileBox_item[index].style.display = "grid";
		});
	});

	function scrollToLetter(letter) {
		const container = document.getElementById("containerLetter");
		const content = document.getElementById("contentLetter");
		const targetElement = Array.from(content.children).find((child) =>
			child.textContent.includes(letter)
		);

		if (targetElement) {
			const offset =
				targetElement.offsetLeft -
				(container.clientWidth - targetElement.clientWidth) / 2;
			container.scrollLeft = offset;
		}
	}
}


const mobileMenuWrappers = document.querySelectorAll(".mobile-menu-wrapper");
const mobileOffcanvasWrappers = document.querySelectorAll(".offcanvas-search");

var mobileMenu = window.mobileMenus;
var mobileMenu2 = window.mobileMenus2;

function handleClassChange(mutationsList, observer) {
	for (const mutation of mutationsList) {
		if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
			const isClassAdded = mutation.target.classList.contains('open');

			if (isClassAdded) {
				bottomMenu.style.display = "none";
				document.querySelector("body").style.overflow = "hidden";
				// Add your code here for when the class is added
			} else {
				bottomMenu.style.display = "block";
				document.querySelector("body").style.overflow = "scroll";
				// Add your code here for when the class is removed
			}
		}
	}
}

let findUlIndex = document.querySelectorAll(".mobile-menu .has-children.position-static:not(.mb-2)");

[...findUlIndex].forEach((item, index) => {
	item.addEventListener("click", () => {
		let swiper_mobile = item.querySelector(".swiper_mobile_container_box .swiper_mobile");
		let swiper_mobile_2 = item.querySelector(".swiper_mobile_container_box .swiper_mobile_second");

		if (swiper_mobile) {
			let swiperInstance;
			let observer = new IntersectionObserver((entries, observer) => {
				if (entries[0].isIntersecting && !swiperInstance) {
					swiperInstance = new Swiper(swiper_mobile, {
						slidesPerView: 2,
						spaceBetween: 10,
						direction: "vertical",
						loop: true,
						speed: 800,
					});
					if(!swiperInstance.autoplay.running){
						swiperInstance.autoplay.reverseDirection = true;
						swiperInstance.autoplay.start();
					}
				}
			});
			observer.observe(document.querySelectorAll('.swiper_mobile')[index - 1]);
		}

		if (swiper_mobile_2) {
			let swiperInstance2;
			let observer2 = new IntersectionObserver((entries, observer) => {
				if (entries[0].isIntersecting) {
					swiperInstance2 = new Swiper(swiper_mobile_2, {
						slidesPerView: 2,
						spaceBetween: 10,
						loop: true,
						speed: 800,
					});
					if(!swiperInstance2.autoplay.running){
						swiperInstance2.autoplay.reverseDirection = true;
						swiperInstance2.autoplay.start();
					}
				}
			});
			observer2.observe(document.querySelectorAll('.swiper_mobile_second')[index - 4]);
		}
	});
});




// Create a MutationObserver with the callback function
const observer = new MutationObserver(handleClassChange);

// Observe each element with the class "mobile-menu-wrapper"
mobileMenuWrappers.forEach((element) => {
	observer.observe(element, { attributes: true });
});

mobileOffcanvasWrappers.forEach((element) => {
	observer.observe(element, { attributes: true });
});

let scrollToTop = document.getElementsByClassName("scrollToTop");
let scrollToEnd = document.getElementsByClassName("scrollToEnd");

scrollToTop[0].addEventListener("click", () => {
	window.scrollTo({
		top: 0,
		behavior: "smooth"
	});
});

scrollToEnd[0].addEventListener("click", () => {
	window.scrollTo({
		top: document.body.scrollHeight,
		behavior: "smooth"
	});
});

const contactInfo_icon_id = document.getElementById("contactInfo-icon-id");
const contactContent = document.getElementById("contactContent");

let isContentVisible = false;

contactInfo_icon_id.addEventListener('click', () => {
	if (isContentVisible) {
		// If content is visible, hide it
		contactContent.style.display = "none";
	} else {
		// If content is not visible, show it
		contactContent.style.display = "block";
	}

	// Toggle the state for the next click
	isContentVisible = !isContentVisible;
});

const close_button = document.getElementsByClassName("close-button");
const coupon_icon_wrap = document.getElementsByClassName("coupon-icon-wrap");

[...close_button].forEach((item, index) => {
	item.addEventListener("click", () => {
		coupon_icon_wrap[index].style.setProperty("display", "none", "important");
	});
});

function updateClock() {
	// Create a new Date object
	const now = new Date();

	// Format the date and time
	const formattedDate = formatDate(now);
	const formattedTime = formatTime(now);

	// Display the formatted date and time
	const kortime = document.getElementById("kortime");
	kortime.textContent = `${formattedDate} ${formattedTime}`;
}

function formatDate(date) {
	const options = { weekday: 'long', year: 'numeric', month: '2-digit', day: '2-digit' };
	return date.toLocaleDateString('en-US', options);
}

function formatTime(date) {
	const options = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
	return date.toLocaleTimeString('en-US', options);
}

// Update the clock every second
setInterval(updateClock, 1000);

// Initial update
updateClock();

const product_carousel_swiper = document.querySelectorAll(".product-carousel .swiper-container");
const product_carousel_swiper_wrapper = document.querySelectorAll(".product-carousel .swiper-wrapper");

// Function to check if the device is a mobile device based on screen width
function isMobileDevice() {
	return window.innerWidth <= 768; // Adjust the width threshold as needed
}

// Execute the code only if the device is a mobile device
if (isMobileDevice()) {
	[...product_carousel_swiper_wrapper].forEach((wrapper, index) => {
		const height = wrapper.clientHeight;
		[...product_carousel_swiper].forEach((swiper, i) => {
			// index === i ? swiper.style.cssText += `height: ${height}px !important;` : swiper.style.cssText += `height: 412px !important;`;
			swiper.style.cssText += `height: 100% !important;`;
		});
	});
}

const cart_items_header = document.getElementsByClassName("cart_items_header");
const card_content = document.getElementsByClassName("card_content");

if (cart_items_header) {
	[...cart_items_header].forEach(item => {
		let findImg = item.querySelector("img");
		findImg.style.transition = "transform 0.3s"; // Add transition for smooth rotation
		let card_content = item.nextElementSibling; // Assuming card_content is defined somewhere in your code
		let isContentVisible = true; // Flag to track content visibility
		item.addEventListener("click", () => {
			card_content.style.display = isContentVisible ? "none" : "block";
			// Rotate the image by 180 degrees
			findImg.style.transform = isContentVisible ? "rotate(180deg)" : "rotate(0deg)";
			// Update content visibility state
			isContentVisible = !isContentVisible;
		})
	})
}

const card_item_box_item_right = document.getElementsByClassName("card_item_box_item_right");

[...card_item_box_item_right].forEach(item => {
	item.addEventListener("click", () => {
		confirm("Are you sure you want to delete?")
	})
})

const accordionItems = document.querySelectorAll('.custom-accordion-item');

// Add click event listener to each accordion header
accordionItems.forEach(item => {
	const header = item.querySelector('.custom-accordion-header');
	header.addEventListener('click', () => {
		// Toggle active class on clicked item
		item.classList.toggle('active');
		header.classList.toggle('active');
	});
});

const shipping_modal = document.getElementsByClassName("shipping_modal");
const shipping_modal_box = document.getElementsByClassName("shipping_modal_box");

[...shipping_modal].forEach(item => {
	item.addEventListener("click", (e) => {
		e.preventDefault();
		let shipping_modal_box_close = shipping_modal_box[0].querySelector(".shipping_modal_content .shipping_modal_content_head .shipping_modal_content_head_close");
		shipping_modal_box[0].style.display = "flex";
		document.body.style.overflow = "hidden";

		shipping_modal_box_close.addEventListener("click", () => {
			shipping_modal_box[0].style.display = "none";
			document.body.style.overflow = "initial";
		})
	})
});

document.addEventListener("DOMContentLoaded", function () {
	var checkboxes = document.querySelectorAll(".selected_checkbox .cart_common");
	var removeButton = document.getElementById("removeSelected");

	if (checkboxes) {
		checkboxes.forEach(function (checkbox) {
			var checkedImg = checkbox.parentElement.querySelector(".checked");
			var uncheckedImg = checkbox.parentElement.querySelector(".unchecked");

			checkbox.addEventListener("change", function () {
				if (checkbox.checked) {
					checkedImg.style.display = "inline-block";
					uncheckedImg.style.display = "none";
				} else {
					checkedImg.style.display = "none";
					uncheckedImg.style.display = "inline-block";
				}
			});
		});

		if (removeButton) {
			removeButton.addEventListener("click", function () {
				var selectedIndexes = [];

				checkboxes.forEach(function (checkbox, index) {
					if (checkbox.checked) {
						selectedIndexes.push(index);
					}
				});

				selectedIndexes.reverse().forEach(function (index) {
					var cardItem = document.querySelectorAll(".card_item_box_item")[index];
					if (cardItem) {
						cardItem.remove();
					}
				});
			});
		}
	}

});

