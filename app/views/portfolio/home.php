<?php $this->layout('layouts/main', ['title' => 'Home - My Portfolio']) ?>

<!-- Hero Section -->
<section class="hero-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold"><?= htmlspecialchars($profile['name']) ?></h1>
                <h2 class="h3 text-muted mb-4"><?= htmlspecialchars($profile['title']) ?></h2>
                <p class="lead mb-4"><?= htmlspecialchars($profile['bio']) ?></p>
                <div class="d-flex gap-3">
                    <a href="/contact" class="btn btn-primary">Contact Me</a>
                    <a href="/projects" class="btn btn-outline-primary">View Projects</a>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <img src="<?= htmlspecialchars($profile['profile_image']) ?>" 
                     alt="Profile Image" 
                     class="img-fluid rounded-circle shadow-lg"
                     style="max-width: 400px;">
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects Section -->
<section class="featured-projects py-5">
    <div class="container">
        <h2 class="text-center mb-5">Featured Projects</h2>
        <div class="row g-4">
            <?php foreach ($featured_projects as $project): ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?= htmlspecialchars($project['image_url']) ?>" 
                         class="card-img-top" 
                         alt="<?= htmlspecialchars($project['title']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($project['title']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars(substr($project['description'], 0, 150)) ?>...</p>
                        <div class="d-flex gap-2 mb-3">
                            <?php foreach (explode(',', $project['technologies']) as $tech): ?>
                                <span class="badge bg-primary"><?= htmlspecialchars(trim($tech)) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <a href="/project/<?= $project['id'] ?>" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Experience Preview Section -->
<section class="experience-preview py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Work Experience</h2>
        <div class="row">
            <?php foreach (array_slice($experiences, 0, 3) as $experience): ?>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($experience['position']) ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?= htmlspecialchars($experience['company_name']) ?>
                        </h6>
                        <p class="card-text">
                            <?= htmlspecialchars(substr($experience['description'], 0, 100)) ?>...
                        </p>
                        <p class="text-muted">
                            <?= date('M Y', strtotime($experience['start_date'])) ?> - 
                            <?= $experience['current'] ? 'Present' : date('M Y', strtotime($experience['end_date'])) ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <a href="/experience" class="btn btn-outline-primary">View All Experience</a>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section class="skills py-5">
    <div class="container">
        <h2 class="text-center mb-5">Skills & Expertise</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Frontend Development</h5>
                        <ul class="list-unstyled">
                            <li>HTML5 & CSS3</li>
                            <li>JavaScript (ES6+)</li>
                            <li>React.js</li>
                            <li>Bootstrap</li>
                            <li>Responsive Design</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Backend Development</h5>
                        <ul class="list-unstyled">
                            <li>PHP</li>
                            <li>MySQL</li>
                            <li>RESTful APIs</li>
                            <li>MVC Architecture</li>
                            <li>Git Version Control</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Tools & Technologies</h5>
                        <ul class="list-unstyled">
                            <li>Docker</li>
                            <li>VS Code</li>
                            <li>GitHub</li>
                            <li>Postman</li>
                            <li>Agile Methodologies</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 