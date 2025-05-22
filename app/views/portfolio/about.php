<?php $this->layout('layouts/main', ['title' => 'About Me - My Portfolio']) ?>

<!-- About Hero Section -->
<section class="about-hero py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="<?= htmlspecialchars($profile['profile_image']) ?>" 
                     alt="Profile Image" 
                     class="img-fluid rounded-3 shadow-lg w-100"
                     style="max-height: 500px; object-fit: cover;">
            </div>
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">About Me</h1>
                <div class="lead mb-4"><?= nl2br(htmlspecialchars($profile['bio'])) ?></div>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt text-primary me-3 fa-lg"></i>
                            <div>
                                <h6 class="mb-0">Location</h6>
                                <p class="text-muted mb-0"><?= htmlspecialchars($profile['location']) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope text-primary me-3 fa-lg"></i>
                            <div>
                                <h6 class="mb-0">Email</h6>
                                <p class="text-muted mb-0"><?= htmlspecialchars($profile['email']) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-phone text-primary me-3 fa-lg"></i>
                            <div>
                                <h6 class="mb-0">Phone</h6>
                                <p class="text-muted mb-0"><?= htmlspecialchars($profile['phone']) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-file-alt text-primary me-3 fa-lg"></i>
                            <div>
                                <h6 class="mb-0">Resume</h6>
                                <a href="<?= htmlspecialchars($profile['resume_url']) ?>" class="text-decoration-none" target="_blank">
                                    Download CV <i class="fas fa-download ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social-links">
                    <a href="<?= htmlspecialchars($profile['linkedin_url']) ?>" class="btn btn-outline-primary me-2" target="_blank">
                        <i class="fab fa-linkedin-in me-2"></i>LinkedIn
                    </a>
                    <a href="<?= htmlspecialchars($profile['github_url']) ?>" class="btn btn-outline-dark" target="_blank">
                        <i class="fab fa-github me-2"></i>GitHub
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experience Timeline Section -->
<section class="experience-timeline py-5">
    <div class="container">
        <h2 class="text-center mb-5">Professional Journey</h2>
        <div class="timeline">
            <?php foreach ($experiences as $index => $experience): ?>
            <div class="timeline-item <?= $index % 2 == 0 ? 'left' : 'right' ?>">
                <div class="timeline-content">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0"><?= htmlspecialchars($experience['position']) ?></h5>
                                <span class="badge bg-primary">
                                    <?= date('M Y', strtotime($experience['start_date'])) ?> - 
                                    <?= $experience['current'] ? 'Present' : date('M Y', strtotime($experience['end_date'])) ?>
                                </span>
                            </div>
                            <h6 class="card-subtitle text-muted mb-3">
                                <?= htmlspecialchars($experience['company_name']) ?>
                                <?php if ($experience['company_website']): ?>
                                    <a href="<?= htmlspecialchars($experience['company_website']) ?>" 
                                       class="text-decoration-none ms-2" 
                                       target="_blank">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                <?php endif; ?>
                            </h6>
                            <p class="card-text"><?= nl2br(htmlspecialchars($experience['description'])) ?></p>
                            <?php if ($experience['location']): ?>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    <?= htmlspecialchars($experience['location']) ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Skills Section with Progress Bars -->
<section class="skills-detailed py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Technical Skills</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Frontend Development</h5>
                        <div class="skill-item mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span>HTML5 & CSS3</span>
                                <span>95%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 95%"></div>
                            </div>
                        </div>
                        <div class="skill-item mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span>JavaScript (ES6+)</span>
                                <span>90%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 90%"></div>
                            </div>
                        </div>
                        <div class="skill-item mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span>React.js</span>
                                <span>85%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Backend Development</h5>
                        <div class="skill-item mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span>PHP</span>
                                <span>90%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 90%"></div>
                            </div>
                        </div>
                        <div class="skill-item mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span>MySQL</span>
                                <span>85%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%"></div>
                            </div>
                        </div>
                        <div class="skill-item mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span>RESTful APIs</span>
                                <span>88%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 88%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add custom CSS for timeline -->
<style>
.timeline {
    position: relative;
    padding: 20px 0;
}

.timeline::before {
    content: '';
    position: absolute;
    width: 2px;
    background: #007bff;
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: -1px;
}

.timeline-item {
    padding: 20px 40px;
    position: relative;
    width: 50%;
}

.timeline-item::before {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    background: #007bff;
    border-radius: 50%;
    top: 24px;
}

.timeline-item.left {
    left: 0;
}

.timeline-item.right {
    left: 50%;
}

.timeline-item.left::before {
    right: -10px;
}

.timeline-item.right::before {
    left: -10px;
}

@media (max-width: 768px) {
    .timeline::before {
        left: 40px;
    }
    
    .timeline-item {
        width: 100%;
        padding-left: 70px;
        padding-right: 20px;
    }
    
    .timeline-item.right {
        left: 0;
    }
    
    .timeline-item.left::before,
    .timeline-item.right::before {
        left: 30px;
    }
}

.skill-item .progress {
    background-color: #e9ecef;
    border-radius: 10px;
}

.skill-item .progress-bar {
    border-radius: 10px;
    transition: width 1s ease-in-out;
}
</style>

<!-- Add JavaScript for skill animations -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const skillItems = document.querySelectorAll('.skill-item');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.querySelector('.progress-bar').style.width = 
                    entry.target.querySelector('.progress-bar').getAttribute('aria-valuenow') + '%';
            }
        });
    }, { threshold: 0.5 });

    skillItems.forEach(item => observer.observe(item));
});
</script> 