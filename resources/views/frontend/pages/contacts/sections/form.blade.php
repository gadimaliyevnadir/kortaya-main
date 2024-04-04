<div class="col-12 col-lg-8 mb-10">
    <div class="section-title" data-aos="fade-up" data-aos-delay="300">
        <h2 class="title pb-3">Get In Touch</h2>
        <span></span>
        <div class="title-border-bottom"></div>
    </div>
    <div class="contact-form-wrapper contact-form">
        <form action="" id="contact-form" method="post">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="input-item mb-4">
                                <input class="input-item name" type="text" placeholder="Your Name *" name="name">
                                <span class="input-error error-name"></span>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="input-item mb-4">
                                <input class="input-item email" type="email" placeholder="Email *" name="email">
                                <span class="input-error error-email"></span>
                            </div>
                        </div>
                        <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                            <div class="input-item mb-4">
                                <input class="input-item subject" type="text" placeholder="Subject *" name="subject">
                                <span class="input-error error-subject"></span>
                            </div>
                        </div>
                        <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                            <div class="input-item mb-8">
                                <textarea class="textarea-item message" name="message" placeholder="Message"></textarea>
                                <span class="input-error error-message"></span>
                            </div>
                        </div>
                        <div class="col-12" data-aos="fade-up" data-aos-delay="500">
                            <button type="submit" id="submit" name="submit"
                                    data-url="{{route('frontend.contactSendRequest')}}"
                                    class="btn btn-dark btn-hover-primary rounded-0 contact_form_btn">Send A Message</button>
                        </div>
                        <p class="col-8 form-message mb-0"></p>
                    </div>
                </div>
            </div>
        </form>
        <p class="form-messege"></p>
    </div>
</div>
