<?php

namespace App\Repository;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repository\User\UserRepository;
use App\Repository\User\UserInterface;
use App\Repository\Role\RoleRepository;
use App\Repository\Role\RoleInterface;
use App\Repository\ProjectCompleted\ProjectCompletedInterface;
use App\Repository\ProjectCompleted\ProjectCompletedRepository;
use App\Repository\ProjectInquiry\ProjectInquiryInterface;
use App\Repository\ProjectInquiry\ProjectInquiryRepository;
use App\Repository\ProjectRunning\ProjectRunningInterface;
use App\Repository\ProjectRunning\ProjectRunningRepository;
use App\Repository\Team\TeamInterface;
use App\Repository\Team\TeamRepository;
use App\Repository\Footer\FooterInterface;
use App\Repository\Footer\FooterRepository;
use App\Repository\Service\ServiceInterface;
use App\Repository\Service\ServiceRepository;
use App\Repository\Vacancy\VacancyInterface;
use App\Repository\Vacancy\VacancyRepository;
use App\Repository\FormData\FormDataInterface;
use App\Repository\FormData\FormDataRepository;
use App\Repository\BackgroundImage\BackgroundImageInterface;
use App\Repository\BackgroundImage\BackgroundImageRepository;
use App\Repository\FrontService\FrontServiceInterface;
use App\Repository\FrontService\FrontServiceRepository;
use App\Repository\Quotation\QuotationInterface;
use App\Repository\Quotation\QuotationRepository;
use App\Repository\FrontContent1\FrontContent1Interface;
use App\Repository\FrontContent1\FrontContent1Repository;
use App\Repository\FrontContent2\FrontContent2Interface;
use App\Repository\FrontContent2\FrontContent2Repository;
use App\Repository\FrontContent3\FrontContent3Interface;
use App\Repository\FrontContent3\FrontContent3Repository;
use App\Repository\FrontContentMain\FrontContentMainInterface;
use App\Repository\FrontContentMain\FrontContentMainRepository;
use App\Repository\DailyUpdate\DailyUpdateInterface;
use App\Repository\DailyUpdate\DailyUpdateRepository;
use App\Repository\AssignProject\AssignProjectInterface;
use App\Repository\AssignProject\AssignProjectRepository;


class RepositoryServiceProvider extends ServiceProvider
{
	/**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(RoleInterface::class, RoleRepository::class);
        $this->app->bind(TeamInterface::class, TeamRepository::class);
        $this->app->bind(ProjectCompletedInterface::class, ProjectCompletedRepository::class);
        $this->app->bind(ProjectInquiryInterface::class, ProjectInquiryRepository::class);
        $this->app->bind(ProjectRunningInterface::class, ProjectRunningRepository::class);
        $this->app->bind(FooterInterface::class, FooterRepository::class);
        $this->app->bind(ServiceInterface::class, ServiceRepository::class);
        $this->app->bind(VacancyInterface::class, VacancyRepository::class);
        $this->app->bind(FormDataInterface::class, FormDataRepository::class);
        $this->app->bind(BackgroundImageInterface::class, BackgroundImageRepository::class);
        $this->app->bind(FrontServiceInterface::class, FrontServiceRepository::class);
        $this->app->bind(QuotationInterface::class, QuotationRepository::class);
        $this->app->bind(FrontContent1Interface::class, FrontContent1Repository::class);
        $this->app->bind(FrontContent3Interface::class, FrontContent3Repository::class);
        $this->app->bind(FrontContent2Interface::class, FrontContent2Repository::class);
        $this->app->bind(FrontContentMainInterface::class, FrontContentMainRepository::class);
        $this->app->bind(DailyUpdateInterface::class, DailyUpdateRepository::class);
        $this->app->bind(AssignProjectInterface::class, AssignProjectRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	// 
    }
}