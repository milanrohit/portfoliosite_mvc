<?php $this->layout('layouts/main', ['title' => 'Projects - My Portfolio']) ?>

<!-- Projects Header -->
<section class="projects-header py-5 bg-light">
    <div class="container">
        <h1 class="display-4 text-center mb-4">My Projects</h1>
        <p class="lead text-center text-muted mb-5">Explore my latest work and personal projects</p>
        
        <!-- Project Filters -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="btn-group w-100" role="group" aria-label="Project filters">
                    <button type="button" class="btn btn-outline-primary active" data-filter="all">All</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="web">Web Development</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="mobile">Mobile Apps</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="other">Other</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="projects-grid py-5">
    <div class="container">
        <div class="row g-4" id="projects-container">
            <?php foreach ($projects as $project): ?>
            <div class="col-md-6 col-lg-4 project-item" data-category="<?= htmlspecialchars($project['category']) ?>">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="position-relative">
                        <img src="<?= htmlspecialchars($project['image_url']) ?>" 
                             class="card-img-top" 
                             alt="<?= htmlspecialchars($project['title']) ?>"
                             style="height: 200px; object-fit: cover;">
                        <?php if ($project['featured']): ?>
                            <span class="position-absolute top-0 end-0 badge bg-primary m-2">Featured</span>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($project['title']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars(substr($project['description'], 0, 150)) ?>...</p>
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <?php foreach (explode(',', $project['technologies']) as $tech): ?>
                                <span class="badge bg-light text-dark"><?= htmlspecialchars(trim($tech)) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/project/<?= $project['id'] ?>" class="btn btn-outline-primary">View Details</a>
                            <div class="project-links">
                                <?php if ($project['project_url']): ?>
                                    <a href="<?= htmlspecialchars($project['project_url']) ?>" 
                                       class="btn btn-link text-dark" 
                                       target="_blank"
                                       title="Live Demo">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ($project['github_url']): ?>
                                    <a href="<?= htmlspecialchars($project['github_url']) ?>" 
                                       class="btn btn-link text-dark" 
                                       target="_blank"
                                       title="GitHub Repository">
                                        <i class="fab fa-github"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <small class="text-muted">
                            <?php if ($project['start_date']): ?>
                                <?= date('M Y', strtotime($project['start_date'])) ?>
                                <?php if ($project['end_date']): ?>
                                    - <?= date('M Y', strtotime($project['end_date'])) ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </small>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Project Modal -->
<div class="modal fade" id="projectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content will be loaded dynamically -->
            </div>
        </div>
    </div>
</div>

<!-- Add custom CSS -->
<style>
.projects-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.btn-group .btn {
    border-radius: 0;
    padding: 0.5rem 1.5rem;
}

.btn-group .btn:first-child {
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
}

.btn-group .btn:last-child {
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
}

.project-item {
    transition: transform 0.3s ease, opacity 0.3s ease;
}

.project-item.hidden {
    display: none;
}

.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.project-links .btn-link {
    padding: 0.25rem;
    font-size: 1.1rem;
}

.project-links .btn-link:hover {
    color: #007bff !important;
}

@media (max-width: 768px) {
    .btn-group {
        flex-wrap: wrap;
    }
    
    .btn-group .btn {
        flex: 1 1 auto;
        margin: 2px;
        border-radius: 0.25rem !important;
    }
}
</style>

<!-- Add JavaScript for filtering and animations -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('[data-filter]');
    const projectItems = document.querySelectorAll('.project-item');
    
    // Filter projects
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter projects
            projectItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.classList.remove('hidden');
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 10);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        item.classList.add('hidden');
                    }, 300);
                }
            });
        });
    });
    
    // Initialize Isotope-like animation
    projectItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'scale(0.8)';
        setTimeout(() => {
            item.style.opacity = '1';
            item.style.transform = 'scale(1)';
        }, 100);
    });
});
</script> 