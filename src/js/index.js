
import '../styles/index.scss';
import { gsap } from "gsap";
import { ScrollTrigger, } from "gsap/ScrollTrigger";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import Scrollbar from 'smooth-scrollbar';
gsap.registerPlugin(ScrollTrigger);
gsap.registerPlugin(ScrollToPlugin);
import customSelect from 'custom-select';
import Swiper, { Pagination, Autoplay } from 'swiper';
import 'swiper/swiper-bundle.css';
import marquee from 'vanilla-marquee';


const isTouchScreen = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i);
const mm = gsap.matchMedia();

document.addEventListener('DOMContentLoaded', () => {
	smoothScroll();
	modalVideo();
	initSelect();
	initSwipers();
	contactForm();
	globalAnimations();
	homePageAnimations();
	newsPageAnimations();
	articlePageAnimations();
	initMarquee();
	portfolioSinglePageAnimations();
	videoPlayer();
});


function videoPlayer() {
	const videoBlock = document.querySelectorAll('[video-holder]');

	if (videoBlock && videoBlock.length > 0) {
		videoBlock.forEach(block => {
			block.addEventListener('click', () => {
				if (block.classList.contains('playing')) {
					block.classList.remove('playing');
					block.querySelector('video').pause();
				} else {
					block.classList.add('playing');
					block.querySelector('video').play()
				}
			})
		})
	}
}




function contactForm() {
	const wpcf7Elm = document.querySelector('.wpcf7');

	// wpcf7Elm.addEventListener('wpcf7mailsent', function (event) {

	// }, false);


	const triggerFileButton = document.querySelector('#form-file');
	const inputFile = document.querySelector('#form-attachment');

	if (triggerFileButton) {
		triggerFileButton.addEventListener('click', function () {
			inputFile.click();
		})
	}

	if (inputFile) {
		inputFile.addEventListener('change', function () {
			if (inputFile.files.length > 0) {
				triggerFileButton.querySelector('.file-title').textContent = inputFile.files[0].name;
			}
		})
	}
}

function initSwipers() {
	const swiper = new Swiper('#swiper-news', {
		modules: [Pagination],
		spaceBetween: 16,
		slidesPerView: 1.5,
		loop: true,
		centeredSlides: true,
		speed: 650,
		slideToClickedSlide: true
	});


	if (window.innerWidth < 768) {
		const swiper2 = new Swiper('#swiper-images', {
			modules: [Pagination],
			spaceBetween: 16,
			// slidesPerView: 1.8,
			slidesPerView: 'auto',
			loop: true,
			centeredSlides: true,
			speed: 650
		});

		const container = document.querySelector('#swiper-images .swiper-wrapper');
		const blocks = document.querySelectorAll('#swiper-images .swiper-slide');

		if (blocks.length > 0) {
			for (var i = 0; i < 3; i++) {
				const newBlock = blocks[i].cloneNode(true);
				container.appendChild(newBlock);
			}
		}


	}

	const swiper3 = new Swiper('#swiper-images-1', {
		// modules: [Pagination],
		slidesPerView: 'auto',
		spaceBetween: 16,
		centeredSlides: true,
		initialSlide: 2,
		speed: 650,

	});





}


function add3DElem() {
	const renderer = new THREE.WebGLRenderer();
	const scene = new THREE.Scene();
	const camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight);
	let mesh;


	renderer.gammaOutput = true;
	renderer.toneMapping = THREE.ReinhardToneMapping;
	renderer.toneMappingExposure = 2.0;

	renderer.setSize(window.innerWidth, window.innerHeight);
	scene.background = new THREE.Color(0xeff5555);
	scene.add(new THREE.HemisphereLight(0xffffff, 0xffffff, 3.0));
	camera.position.set(-1, 2, 10);

	const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
	scene.add(ambientLight);

	const pointLight = new THREE.PointLight(0xffffff, 2, 0, 0);
	pointLight.position.set(1, 1, 1);
	scene.add(pointLight);




	new GLTFLoader().load('./images/l-3d_n.gltf', ({ scene: model }, animations) => {
		scene.add(model);

		model.scale.setScalar(1.5);

		camera.lookAt(model.position);

		// controls.target.copy(model.position);


		mesh = model;
	});

	const animate = () => {
		if (mesh) {
			mesh.rotateY(Math.PI / 360);
		}

		renderer.render(scene, camera);

		renderer.gammaOutput = true;

		requestAnimationFrame(animate);
	};

	animate();

	document.body.appendChild(renderer.domElement);
}

function initSelect() {
	const customSelect = require("custom-select").default;
	customSelect('select');
}

function modalVideo() {
	const openTrigger = document.querySelector('[modal-target]');
	const popupWrap = document.querySelector('.popup-wrap');
	const popupOverlay = document.querySelector('.popup-eclipse');
	const video = document.querySelector('#home-modal-video');

	if (openTrigger) {
		openTrigger.addEventListener('click', function (event) {
			popupWrap.classList.toggle('show');
			// triggerIframePlayer('play');
			video.play();
		})
	}

	if (popupOverlay) {
		popupOverlay.addEventListener('click', function (event) {
			popupWrap.classList.remove('show');
			// triggerIframePlayer('pause');
			video.pause();
		})
	}


	function triggerIframePlayer(toDo) {
		if (iframe && iframe.contentWindow && iframe.contentWindow.postMessage) {
			if (toDo === 'play') {
				iframe.contentWindow.postMessage('{"method":"play"}', 'https://player.vimeo.com');
			} else if (toDo === 'pause') {
				iframe.contentWindow.postMessage('{"method":"pause"}', 'https://player.vimeo.com');
			}
		}
	}

}

function smoothScroll() {
	if (document.body.classList.contains("smooth-scroll")) {
		const ScrollArea = document.querySelector('#content-scroll');
		const scrollbar = Scrollbar.init(document.querySelector('#content-scroll'), { damping: 0.04 });

		ScrollTrigger.scrollerProxy("#content-scroll", {
			scrollTop(value) {
				if (arguments.length) { scrollbar.scrollTop = value; }
				return scrollbar.scrollTop;
			}
		});

		scrollbar.addListener(ScrollTrigger.update);
		ScrollTrigger.defaults({ scroller: ScrollArea });


		const sectionLink = document.querySelector('.brands-item.text-item');

		if (sectionLink) {
			sectionLink.addEventListener('click', function (e) {
				e.preventDefault();
				const scrollHeight = scrollbar.getSize();
				scrollbar.scrollTo(0, scrollHeight.content.height, 1000);

			});
		}
	}
}

// animations
function globalAnimations() {
	function followCursor() {
		const cursor = document.querySelector(".cursor");
		const cursorSection = document.querySelectorAll("[custom-cursor]");
		const hoverElements = document.querySelectorAll(['a', '.mouse-hover']);
		let mouse = { x: 0, y: 0 };
		let pos = { x: 0, y: 0 };
		let ratio = 0.65;
		let active = false;

		if (cursor) {
			document.addEventListener("mousemove", mouseMove);
			document.addEventListener("click", mouseClick);

			function mouseClick() {
				cursor.querySelector(".pulse-click").classList.add('clicked');
				setTimeout(() => {
					cursor.querySelector(".pulse-click").classList.remove('clicked');
				}, 1000)
			}

			function mouseMove(e) {
				var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
				mouse.x = e.pageX;
				mouse.y = e.pageY - scrollTop;
			}

			gsap.ticker.add(updatePosition);

			function updatePosition() {
				if (!active) {
					pos.x += (mouse.x - pos.x) * ratio;
					pos.y += (mouse.y - pos.y) * ratio;

					gsap.to(cursor.querySelector(".cursor-inner"), { xPercent: 0, yPercent: 0, duration: 0.4, x: pos.x, y: pos.y, });
					gsap.to(cursor.querySelector(".cursor-border"), { xPercent: -50, yPercent: -50, duration: 0.2, x: pos.x, y: pos.y, });
				}
			}



			if (hoverElements) {
				hoverElements.forEach(el => {
					el.addEventListener('mouseleave', () => {
						gsap.to(document.querySelector(".cursor .cursor-border"), { duration: 0.3, scale: 1 })
					});
					el.addEventListener('mouseover', () => {
						gsap.to(document.querySelector(".cursor .cursor-border"), { duration: 0.3, scale: 1.5 })
					})
				})
			}


			cursorSection.forEach(section => {
				const classOfCursor = section.getAttribute('custom-cursor');

				section.addEventListener("mouseleave", () => {
					gsap.to(document.querySelector(".cursor .cursor-border"), { duration: 0.3, scale: 1 })
					cursor.classList.remove('custom-cursor');
					cursor.classList.remove(`${classOfCursor}`);
				});
				section.addEventListener("mouseover", () => {
					gsap.to(document.querySelector(".cursor .cursor-border"), { duration: 0.3, scale: 1.5 })
					cursor.classList.add('custom-cursor');
					cursor.classList.add(`${classOfCursor}`);
				});
			});


		}
	}

	function cardServiceImgAnimation() {
		const elements = document.querySelectorAll('[card-service]');


		if (elements) {
			elements.forEach(function (element) {
				element.addEventListener('mousemove', function (e) {
					if (window.innerWidth > 1024) {
						let percentX = ((e.clientX - this.getBoundingClientRect().left) * 100) / this.offsetWidth - 75;
						let percentY = ((e.clientY - (this.getBoundingClientRect().top + window.scrollY)) * 100) / this.offsetHeight;

						this.querySelector('.img-holder').style.left = percentX * 1.25 + 'px';
						this.querySelector('.img-holder').style.bottom = (100 - percentY) * 0.1 + 'px';
					}
				});
			});
		}
	}

	function portfolioCardsAnimations() {
		const hasAnimation = gsap.utils.toArray('.has-animation');

		if (hasAnimation && hasAnimation.length > 0) {
			gsap.set(document.querySelectorAll(".has-animation"), { y: 100, opacity: 0, });
			hasAnimation.forEach(function (hAnimation) {
				const delayValue = parseInt(hAnimation.getAttribute("data-delay")) || 0;
				gsap.to(hAnimation, {
					scrollTrigger: {
						trigger: hAnimation,
						start: "top 85%",
						onEnter: function () {
							hAnimation.classList.add('animated');
						},
					},
					opacity: 1,
					y: 0,
					duration: 0.6,
					ease: "power1.inOut",
					delay: delayValue / 1000,
				});
			});
		}

	}

	followCursor();
	cardServiceImgAnimation();
	portfolioCardsAnimations();


	// articles cards animations
	const cardItems = document.querySelectorAll('.card-article.card-item');
	if (cardItems.length > 0) {
		gsap.set(".card-article.card-item", { y: 100, opacity: 0 });
		ScrollTrigger.batch(".card-article.card-item", {
			onEnter: batch => gsap.to(batch, { autoAlpha: 1, y: 0, stagger: 0.3, duration: 0.6, }),
		});
	}
}

function textFillAnimation(startAnimation, endAnimation, elements) {
	const hasMaskFillElements = document.querySelectorAll(`.${elements}`);

	if (hasMaskFillElements) {
		hasMaskFillElements.forEach((hMaskFill) => {
			const spanFillMask = hMaskFill.querySelectorAll("span");

			spanFillMask.forEach((span, index) => {
				ScrollTrigger.create({
					trigger: hMaskFill,
					start: startAnimation,
					end: () => `+=${hMaskFill.offsetHeight * endAnimation}`,
					scrub: 1,
					onUpdate: (self) => {
						span.style.backgroundSize = `${0 + self.progress * 100}% 100%`;
					},
					ease: "power1.inOut",
					duration: 5,
				});
			});
		});
	}
}

function newsPageAnimations() {
	const page = document.querySelector(".page-articles");

	if (page) {
		gsap.fromTo(
			document.querySelector(".page-articles .page-title"),
			{
				y: 50,
				opacity: 0,
			},
			{
				y: 0,
				opacity: 1,
				duration: 0.6,
				scrollTrigger: {
					trigger: document.querySelector(".page-articles .page-title"),
					start: 'top 50%',
				},
			}
		);

		// gsap.fromTo(
		// 	document.querySelector(".page-articles .swiper-news"),
		// 	{
		// 		y: 100,
		// 		opacity: 0,
		// 		scale: 0
		// 	},
		// 	{
		// 		y: 0,
		// 		opacity: 1,
		// 		scale: 1,
		// 		duration: 0.8,
		// 		delay: 0.6,
		// 		scrollTrigger: {
		// 			trigger: document.querySelector(".page-articles .page-title"),
		// 			start: 'top 50%',
		// 		},
		// 	}
		// );
	}


}

function homePageAnimations() {
	const page = document.querySelector(".page-home");

	if (page) {
		gsap.set(".brands-item", { y: 100, opacity: 0 });

		ScrollTrigger.batch(" .brands-item", {
			onEnter: batch => gsap.to(batch, { autoAlpha: 1, y: 0, stagger: 0.3, duration: 0.6, }),
		});


		textFillAnimation("top 85%", 2, 'has-mask-fill');

		gsap.set(".section-video .video-holder", { scale: 1, y: 0, })
		gsap.to(".section-video .video-holder", {
			y: -50,
			scale: 0.8,
			scrollTrigger: {
				trigger: ".section-video .video-holder",
				start: "top 80%",
				end: "bottom 50%",
				pin: false,
				scrub: 1
			}
		})
	}


}

function articlePageAnimations() {
	const page = document.querySelector(".page-article");

	if (page) {
		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: page,
				start: 'top 70%',
			}
		});
		tl.fromTo(".link-animation-holder",
			{
				x: -50,
				opacity: 0,
			},
			{
				x: 0,
				opacity: 1,
				duration: 0.6,
			}
		).fromTo(
			document.querySelector(".img-holder"),
			{
				y: 50,
				opacity: 0,
			},
			{
				y: 0,
				opacity: 1,
				duration: 0.6,
				delay: 0.01,
			}
		).fromTo(
			document.querySelector(".card-title"),
			{
				y: 50,
				opacity: 0,
			},
			{
				y: 0,
				opacity: 1,
				duration: 0.6,
				delay: 0.01,
			}
		).fromTo(
			document.querySelector(".meta-info"),
			{
				y: 50,
				opacity: 0,
			},
			{
				y: 0,
				opacity: 1,
				duration: 0.6,
				delay: 0.01,
			}
		);


		const hasAnimation = gsap.utils.toArray('.content-holder > *');

		gsap.set(document.querySelectorAll(".content-holder > *"), { y: 100, opacity: 0, });
		hasAnimation.forEach(function (hAnimation) {
			const delayValue = parseInt(hAnimation.getAttribute("data-delay")) || 0;
			tl.to(hAnimation, {
				// scrollTrigger: {
				// 	trigger: hAnimation,
				// 	start: "top 90%",
				// 	onEnter: function () {
				// 		hAnimation.classList.add('animated');
				// 	},
				// },
				opacity: 1,
				y: 0,
				duration: 0.35,
				ease: "power1.inOut",
				delay: delayValue / 1000,
			});
		});

	}
}





function initMarquee() {
	const blocks = document.querySelectorAll('.block-marquee .marquee-row');
	const nextCaseBlock = document.querySelector('.block_next-case');

	if (blocks) {
		blocks.forEach((item, index) => {
			index++;
			if (index === 1) {
				new marquee(document.querySelector(`.marquee-row-${index}`), { duplicated: true, direction: 'left', speed: 50, startVisible: true, delayBeforeStart: 2000, duration: 0, gap: 0 });
			} else if (index === 2) {
				new marquee(document.querySelector(`.marquee-row-${index}`), { duplicated: true, direction: 'right', speed: 50, startVisible: true, delayBeforeStart: 0, gap: 0 });
			} else if (index === 3) {
				new marquee(document.querySelector(`.marquee-row-${index}`), { duplicated: true, direction: 'left', speed: 50, startVisible: true, delayBeforeStart: 0, gap: 0 });
			}
		})
	}

	if (nextCaseBlock) {
		new marquee(document.querySelector(`.block_next-case .case-marquee`), { duplicated: true, direction: 'left', speed: 10, startVisible: true, delayBeforeStart: 0, gap: 0 });
	}

	if (document.querySelectorAll('.block_single-marquee .marquee-holder')) {
		document.querySelectorAll('.block_single-marquee .marquee-holder').forEach((item) => {
			new marquee(item, { duplicated: true, direction: 'left', speed: 20, startVisible: true, delayBeforeStart: 2000, duration: 0, gap: 0 });
		})
	}




}



function portfolioSinglePageAnimations() {
	const page = document.querySelector(".page-portfolio-single");


	if (page) {
		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: page,
				start: 'top 70%',
			},
			defaults: {
				ease: "esae.in",
			},
		});

		tl.fromTo(
			page.querySelectorAll(".breadcrumb li"),
			{
				x: -20,
				opacity: 0,
			},
			{
				x: 0,
				opacity: 1,
				stagger: 0.3,
			}
		).fromTo(
			page.querySelector(".title-holder"),
			{
				scale: 0
			},
			{
				scale: 1,
				opacity: 1,
				duration: 0.65,
			}
		).fromTo(
			page.querySelectorAll(".page-tags li"),
			{
				opacity: 0,
				x: -20
			},
			{
				opacity: 1,
				x: 0,
				duration: 0.35,
				stagger: 0.3,
			}
		).fromTo(
			page.querySelectorAll(".two-text-blocks .block-content"),
			{
				y: 20,
				opacity: 0,
			},
			{
				y: 0,
				opacity: 1,
				stagger: 0.3,
				duration: 0.55,
			}
		);


		if (page.querySelectorAll(".block-logo") && page.querySelectorAll(".block-logo").length > 0) {
			gsap.fromTo(
				page.querySelectorAll(".block-logo"),
				{
					scale: 0.5,
					y: 10,
					opacity: 0,
				},
				{
					scale: 1,
					y: 0,
					opacity: 1,
					duration: 0.65,
					scrollTrigger: {
						trigger: page.querySelectorAll(".block-logo"),
						start: 'top 75%',
					},
				}
			)
		}

		if (page.querySelectorAll(".block-full-img") && page.querySelectorAll(".block-full-img").length > 0) {
			gsap.fromTo(
				page.querySelectorAll(".block-full-img"),
				{
					y: 100,
					opacity: 0,
				},
				{
					y: 0,
					opacity: 1,
					duration: 0.65,
					scrollTrigger: {
						trigger: page.querySelectorAll(".block-full-img"),
						start: 'top 75%',
					},
				}
			)
		}


		if (page.querySelectorAll(".block_single-marquee") && page.querySelectorAll(".block_single-marquee").length > 0) {
			gsap.fromTo(
				page.querySelectorAll(".block_single-marquee"),
				{
					y: 100,
					opacity: 0,
				},
				{
					y: 0,
					opacity: 1,
					duration: 0.65,
					scrollTrigger: {
						trigger: document.querySelectorAll(".block_single-marquee"),
						start: 'top 75%',
					},
				}
			)

		}


		const titleAndText = document.querySelectorAll('.images-block .block-title, .images-block .text-holder');
		if (titleAndText.length > 0) {
			gsap.set(titleAndText, { y: 100, opacity: 0 });
			ScrollTrigger.batch(titleAndText, {
				onEnter: batch => gsap.to(batch, { autoAlpha: 1, y: 0, stagger: 0.7, duration: 0.6, }),
			});
		}

		const blocksContent = document.querySelectorAll(['.images-block, .img-holder', '.images-block .video-holder']);
		if (blocksContent.length > 0) {
			gsap.set(blocksContent, { opacity: 0 });
			ScrollTrigger.batch(blocksContent, {
				onEnter: batch => gsap.to(batch, { autoAlpha: 1, stagger: 0.3, duration: 0.6, }),
				start: 'top 75%'
			});
		}


		mm.add("(min-width: 1200px)", () => {
			gsap.set(".special-block .first-row", { translateX: '0%' })
			gsap.to(".special-block .first-row", {
				translateX: '10%',
				scrollTrigger: {
					trigger: ".special-block .first-row",
					start: "top 50%",
					end: "bottom 50%",
					pin: false,
					scrub: 1,
				}
			})


			gsap.set(".special-block .second-row", { translateX: '-20%' })
			gsap.to(".special-block .second-row", {
				translateX: '-30%',
				scrollTrigger: {
					trigger: ".special-block .second-row",
					start: "top 80%",
					end: "bottom 50%",
					pin: false,
					scrub: 1,

				}
			})
		});




	}
}