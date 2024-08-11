    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Testimonial</h1>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fs-5 fw-bold text-primary">Testimonial</p>
                    <h1 class="display-5 mb-5">What Our Clients Say About Us!</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam
                        et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                </div>
                <div class="col-lg-7 text-right wow fadeInUp" data-wow-delay="0.5s">
                    <div class="testimonial-container">
                        <div class="testimonial-item active">
                            <img class="img-fluid rounded mb-3" src="img/testimonial-1.jpg" alt="">
                            <p class="fs-5">Saya senang bekerja dengan mereka. Profesionalisme tinggi dan hasil kerja
                                yang memukau! Lingkungan sekolah saya bersih</p>
                            <h4>Andi. S</h4>
                            <span>Kepala Sekolah</span>
                        </div>
                        <div class="testimonial-item">
                            <img class="img-fluid rounded mb-3" src="img/testimonial-2.jpg" alt="">
                            <p class="fs-5">Layanan jemput sampah mereka sangat membantu mengurangi beban saya. Timnya
                                selalu tepat waktu dan ramah! Saya juga tidak lagi kebingungan menjual sampah</p>
                            <h4>Maria Kesuma</h4>
                            <span>Ibu Rumah Tanggar</span>
                        </div>
                    </div>
                    <button class="testimonial-btn testimonial-btn-left bg-transparent border-0 text-primary fw-bold"
                        onclick="nextTestimonial()"
                        style="visibility: visible !important; opacity: 1 !important;">&lt;</button>
                    <button class="testimonial-btn testimonial-btn-right bg-transparent border-0 text-primary fw-bold"
                        onclick="nextTestimonial()"
                        style="visibility: visible !important; opacity: 1 !important;">&gt;</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Add your existing scripts here -->
    <script>
        var currentIndex = 0;

        function nextTestimonial() {
            var testimonials = document.querySelectorAll('.testimonial-item');

            // Hide the current testimonial
            testimonials[currentIndex].classList.remove('active');

            // Move to the next testimonial
            currentIndex = (currentIndex + 1) % testimonials.length;

            // Show the next testimonial
            testimonials[currentIndex].classList.add('active');
        }
    </script>
