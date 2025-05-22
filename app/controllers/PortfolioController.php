<?php

namespace App\Controllers;

use App\Models\Profile;
use App\Models\Experience;
use App\Models\Project;

class PortfolioController extends Controller
{
    private $profile;
    private $experience;
    private $project;

    public function __construct()
    {
        parent::__construct();
        $this->profile = new Profile();
        $this->experience = new Experience();
        $this->project = new Project();
    }

    public function index()
    {
        $data = [
            'profile' => $this->profile->getProfile(),
            'featured_projects' => $this->project->getFeaturedProjects(),
            'experiences' => $this->experience->getAllExperiences()
        ];
        
        return $this->view('portfolio/home', $data);
    }

    public function about()
    {
        $data = [
            'profile' => $this->profile->getProfile(),
            'experiences' => $this->experience->getAllExperiences()
        ];
        
        return $this->view('portfolio/about', $data);
    }

    public function projects()
    {
        $data = [
            'projects' => $this->project->getAllProjects()
        ];
        
        return $this->view('portfolio/projects', $data);
    }

    public function project($id)
    {
        $data = [
            'project' => $this->project->getProject($id)
        ];
        
        return $this->view('portfolio/project-detail', $data);
    }

    public function experience()
    {
        $data = [
            'experiences' => $this->experience->getAllExperiences()
        ];
        
        return $this->view('portfolio/experience', $data);
    }

    public function contact()
    {
        $data = [
            'profile' => $this->profile->getProfile()
        ];
        
        return $this->view('portfolio/contact', $data);
    }
} 