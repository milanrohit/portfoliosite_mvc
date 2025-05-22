<?php $this->layout('layouts/main', ['title' => 'Contact - My Portfolio']) ?>

<!-- Contact Header -->
<section class="contact-header py-5 bg-light">
    <div class="container">
        <h1 class="display-4 text-center mb-4">Get in Touch</h1>
        <p class="lead text-center text-muted mb-5">Let's discuss your next project or opportunity</p>
    </div>
</section>

<!-- Contact Content -->
<section class="contact-content py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Contact Information</h5>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-primary fa-2x"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Location</h6>
                                <p class="text-muted mb-0"><?= htmlspecialchars($profile['location']) ?></p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <i class="fas fa-envelope text-primary fa-2x"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Email</h6>
                                <a href="mailto:<?= htmlspecialchars($profile['email']) ?>" class="text-muted text-decoration-none">
                                    <?= htmlspecialchars($profile['email']) ?>
                                </a>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <i class="fas fa-phone text-primary fa-2x"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Phone</h6>
                                <a href="tel:<?= htmlspecialchars($profile['phone']) ?>" class="text-muted text-decoration-none">
                                    <?= htmlspecialchars($profile['phone']) ?>
                                </a>
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-clock text-primary fa-2x"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Availability</h6>
                                <p class="text-muted mb-0">Available for freelance work and full-time opportunities</p>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                        
                        <h6 class="mb-3">Connect with me</h6>
                        <div class="social-links">
                            <a href="<?= htmlspecialchars($profile['linkedin_url']) ?>" 
                               class="btn btn-outline-primary me-2" 
                               target="_blank">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="<?= htmlspecialchars($profile['github_url']) ?>" 
                               class="btn btn-outline-dark me-2" 
                               target="_blank">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="btn btn-outline-info" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Send me a message</h5>
                        
                        <form id="contactForm" action="/contact/send" method="POST" class="needs-validation" novalidate>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" 
                                               class="form-control" 
                                               id="name" 
                                               name="name" 
                                               placeholder="Your Name" 
                                               required>
                                        <label for="name">Your Name</label>
                                        <div class="invalid-feedback">
                                            Please enter your name.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" 
                                               class="form-control" 
                                               id="email" 
                                               name="email" 
                                               placeholder="Your Email" 
                                               required>
                                        <label for="email">Your Email</label>
                                        <div class="invalid-feedback">
                                            Please enter a valid email address.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" 
                                               class="form-control" 
                                               id="subject" 
                                               name="subject" 
                                               placeholder="Subject" 
                                               required>
                                        <label for="subject">Subject</label>
                                        <div class="invalid-feedback">
                                            Please enter a subject.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" 
                                                  id="message" 
                                                  name="message" 
                                                  placeholder="Your Message" 
                                                  style="height: 150px" 
                                                  required></textarea>
                                        <label for="message">Your Message</label>
                                        <div class="invalid-feedback">
                                            Please enter your message.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-paper-plane me-2"></i>Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section py-5 bg-light">
    <div class="container">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </div>
</section>

<!-- Add custom CSS -->
<style>
.contact-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.form-floating > .form-control {
    padding: 1rem 0.75rem;
}

.form-floating > label {
    padding: 1rem 0.75rem;
}

.social-links .btn {
    width: 40px;
    height: 40px;
    padding: 0;
    line-height: 40px;
    text-align: center;
    border-radius: 50%;
}

.social-links .btn i {
    line-height: 40px;
}

#map {
    border-radius: 0.375rem;
}

@media (max-width: 768px) {
    .contact-content .card {
        margin-bottom: 1.5rem;
    }
}
</style>

<!-- Add JavaScript for form validation and map -->
<script>
// Form validation
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        
        form.classList.add('was-validated');
    });
});

// Initialize map (using Leaflet.js)
document.addEventListener('DOMContentLoaded', function() {
    // Replace with your actual location coordinates
    const location = [51.505, -0.09]; // Example coordinates
    
    const map = L.map('map').setView(location, 13);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
    
    L.marker(location)
        .addTo(map)
        .bindPopup('My Location')
        .openPopup();
});
</script>

<!-- Add Leaflet.js for map -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> 