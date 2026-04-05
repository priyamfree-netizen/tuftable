import ModalVideo from "react-modal-video";
import "react-modal-video/scss/modal-video.scss";
import { useState } from "react";
import Button from "@components/Buttons";
import { ButtonPlay } from "@components/Buttons/Button";

const HeroSection = () => {
  const [isOpen, setOpen] = useState(false);

  return (
    <div className="home-1_hero-section" id="hero">
      <div className="home-1_hero-shape-1">
        <img src="/image/home-1/hero-shape-1.svg" alt="hero shape One" />
      </div>
      <div className="home-1_hero-shape-2">
        <img src="/image/home-1/hero-shape-2.svg" alt="hero shape two" />
      </div>
      <div className="container">
        <div className="row row--hero-content">
          <div
            className="col-xxl-auto col-lg-6 col-md-7 col-sm-8 col-10  transform-none "
            
          >
            <div className="home-1_hero-image-block">
              <div className="home-1_hero-image">
                <img src="/image/home-1/hero-image.png" alt="hero image" />
                <ModalVideo
                  channel="youtube"
                  youtube={{ mute: 0, autoplay: 0 }}
                  isOpen={isOpen}
                  videoId="zo9dJFo8H8g"
                  onClose={() => setOpen(false)}
                />
                <ButtonPlay
                  setOpen={setOpen}
                  className="absolute-center btn-play sonar-emitter cursor-pointer"
                />
              </div>
            </div>
          </div>
          <div
            className="col-xxl-auto col-lg-6 col-md-10"
            data-aos-duration={1000}
            data-aos="fade-right"
            data-aos-delay={300}
          >
            <div className="home-1_hero-content">
              <div className="home-1_hero-content-text">
                <h1 className="hero-content__title heading-xxl">
                  We focus on growing your brand online
                </h1>
                <p>
                  Build world-class digital products with a team of design,
                  development &amp; strategy experts. All in one place. We can
                  provide your business with a variety of digital solutions.
                </p>
              </div>
              <div className="home-1_hero-newsletter">
                <form action="#" className="newsletter-form-1">
                  <input
                    type="email"
                    placeholder="Enter your email"
                    className="form-control"
                  />
                  <Button role="submit" className="rounded-pill">
                    Subscribe
                  </Button>
                </form>
                <span className="home-1_hero-newsletter__bottom-text">
                  <img src="/image/icons/icon-check-blue.svg" alt="icon" /> No
                  credit card is required. You can cancel anytime
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default HeroSection;
