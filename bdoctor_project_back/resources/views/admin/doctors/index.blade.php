@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card card-shadow-1 mb-1">
            <div class="card-body pb-0 pt-1">





                <div class="unified-doctor-header mt-0 mt-sm-1 pt-1 pt-sm-0" data-id="doctor-header-section">
                    <div class="unified-doctor-header-info">
                        <div class="media mb-1 pb-2 pb-md-1 align-items-stretch">
                            <div class="unified-doctor-header-info__top-bg d-sm-none">
                                <img src="//s3-eu-west-1.amazonaws.com/miodottore.it/doctor/5f58d7/5f58d7aa0e9a7e4d85ec2ad8168b9ecf_220_square.jpg"
                                    alt="Carlo Rando, andrologo Milano">
                            </div>

                            <div class="pr-2">
                                <div data-image-gallery="true">
                                    <a href="//s3-eu-west-1.amazonaws.com/miodottore.it/doctor/5f58d7/5f58d7aa0e9a7e4d85ec2ad8168b9ecf_large.jpg"
                                        class="avatar unified-doctor-header-info__avatar" itemprop="image"
                                        rel="certificates">
                                        <img src="//s3-eu-west-1.amazonaws.com/miodottore.it/doctor/5f58d7/5f58d7aa0e9a7e4d85ec2ad8168b9ecf_220_square.jpg"
                                            alt="Carlo Rando, andrologo Milano">
                                    </a>
                                </div>
                            </div>

                            <div class="media-body d-flex flex-column overflow-hidden">

                                <div class="d-flex justify-content-between align-items-center mb-0-5">
                                    <h1 class="h3 m-0">
                                        <div class="unified-doctor-header-info__name" data-id="profile-fullname-wrapper"
                                            data-test-id="doctor-header-fullname">
                                            <span>Prof.</span>

                                            <span itemprop="name">
                                                {{-- @dd($doctor) --}}
                                                {{ $doctor->user()->name }}
                                            </span>



                                            <span data-toggle="tooltip" data-placement="bottom" title=""
                                                data-original-title="Questo dottore ha confermato la validità dei dati sul suo profilo.">
                                                <i
                                                    class="svg-icon svg-icon-check-filled svg-icon-size-16 svg-icon-color-secondary verified"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Zm6.03-13.47-8 8a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l2.47 2.47 7.47-7.47a.75.75 0 1 1 1.06 1.06Z">
                                                        </path>
                                                    </svg></i>
                                            </span>
                                        </div>

                                        <span
                                            content="https://www.miodottore.it/carlo-rando/andrologo-chirurgo-generale-urologo/milano"
                                            itemprop="url"></span>
                                    </h1>

                                    <div class="d-none d-sm-block">

                                        <div data-id="save-doctor-vue" class="d-flex">
                                            <div data-v-d6dc8cac="" data-id="button-save-doctor"
                                                class="button-save-doctor d-flex align-items-center p-0">
                                                <div data-v-d6dc8cac="" class="d-flex mr-0-5"><i data-v-d6dc8cac=""
                                                        class="svg-icon svg-icon-heart svg-icon-size-16 svg-icon-color-gray-900"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M19.66 3.99c-2.64-1.8-5.9-.96-7.66 1.1-1.76-2.06-5.02-2.91-7.66-1.1-1.4.96-2.28 2.58-2.34 4.29-.14 3.88 3.3 6.99 8.55 11.76l.1.09c.76.69 1.93.69 2.69-.01l.11-.1c5.25-4.76 8.68-7.87 8.55-11.75-.06-1.7-.94-3.32-2.34-4.28ZM12.1 18.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.216 0 2.406.617 3.115 1.55.339.448.825.81 1.387.81.564 0 1.053-.366 1.394-.817A3.982 3.982 0 0 1 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05Z">
                                                            </path>
                                                        </svg></i></div> <span data-v-d6dc8cac="">Salva</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <h2 class="h4 text-muted font-weight-normal mb-0-5 d-flex">
                                    <span class="text-truncate" data-test-id="doctor-specializations">

                                        <a href="/andrologo/milano" title="Andrologo" class="text-muted">Andrologo</a>, <a
                                            href="/chirurgo-generale/milano" title="Chirurgo generale"
                                            class="text-muted">Chirurgo generale</a>, <a href="/urologo/milano"
                                            title="Urologo" class="text-muted">Urologo</a> </span>

                                    <span data-id="doctor-specializations-info-vue" class="text-nowrap"><a href="#"
                                            class="ml-0-5 text-muted"><u>Altro</u></a></span>

                                </h2>






                                <a href="#" class="d-inline-block text-muted mb-0-5"
                                    data-switch-tab="profile-reviews">
                                    <u class="rating rating-lg" data-score="4.5">
                                        <span>30 recensioni</span>
                                    </u>
                                </a>

                                <div class="d-sm-none mt-1">

                                    <div class="d-flex" data-id="save-doctor-mobile-vue">
                                        <save-doctor-app context="profile" :doctor-id="136593"
                                            :show-notifications="true">
                                            <p class="mb-0 d-flex align-items-center">
                                                <span class="d-flex mr-0-5">
                                                    <i
                                                        class="svg-icon svg-icon-heart svg-icon-size-16 svg-icon-color-gray-900"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M19.66 3.99c-2.64-1.8-5.9-.96-7.66 1.1-1.76-2.06-5.02-2.91-7.66-1.1-1.4.96-2.28 2.58-2.34 4.29-.14 3.88 3.3 6.99 8.55 11.76l.1.09c.76.69 1.93.69 2.69-.01l.11-.1c5.25-4.76 8.68-7.87 8.55-11.75-.06-1.7-.94-3.32-2.34-4.28ZM12.1 18.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.216 0 2.406.617 3.115 1.55.339.448.825.81 1.387.81.564 0 1.053-.366 1.394-.817A3.982 3.982 0 0 1 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05Z">
                                                            </path>
                                                        </svg></i>
                                                </span>

                                                <span class="">
                                                    Salva
                                                </span>
                                            </p>
                                        </save-doctor-app>
                                    </div>
                                </div>

                                <div class="d-none d-md-flex flex-wrap unified-doctor-header-buttons mt-auto">

                                    <a role="button" class="btn btn-primary btn-sm-block btn-lg mt-1 mr-1"
                                        data-id="book-visit-btn" data-hide-on-saas-booking-widget=""
                                        data-action="show-calendar" data-context="book a visit" data-ga-event="click"
                                        data-ga-category="Book a visit button - commercial doctor profile"
                                        data-ga-action="Click" data-ga-label="Top of the profile" data-ga-interaction="true"
                                        data-patient-app-event-name="start-booking-flow"
                                        data-patient-app-selector="patient-app-event">
                                        <i class="svg-icon svg-icon-calendar svg-icon-size-18 mr-0-5"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M6 3a1 1 0 0 1 2 0v1h8V3a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1V3ZM5 9v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9H5Zm2 3.5a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm4 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm5-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2ZM8 15a1 1 0 1 0 0 2 1 1 0 0 0 0-2Zm3 1a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm5-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2Z">
                                                </path>
                                            </svg></i> <span>Prenota una visita</span>
                                    </a>






                                    <div class="mt-1 mr-1" data-id="ask-private-question-wrapper">
                                        <a href="#" class="btn btn-light btn-lg btn-block"
                                            data-id="ask-private-question" data-doctor-id="136593" data-ga-event="click"
                                            data-ga-action="click" data-modal-id="ask-private-question-app"
                                            data-ga-category="Start chat conversation button - commercial doctor profile"
                                            data-ga-label="Top of the profile">
                                            <i class="svg-icon svg-icon-bubble-chat-texting svg-icon-size-18 mr-0-5"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M20 2H4c-1.1 0-1.99.9-1.99 2l-.008 17.23c0 1.026 1.36 1.388 1.868.497L6 18h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2ZM9 10a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z">
                                                    </path>
                                                </svg></i>
                                            <span>Invia messaggio</span>
                                        </a>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-id="sso-login-modal-vue">
                        <div id="dpModal_81" role="dialog" tabindex="-1" class="modal fade modal-scrollable"
                            style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div>
                                            <h4 class="modal-title">
                                                Specialisti preferiti
                                            </h4> <!---->
                                        </div> <button aria-label="Close" type="button" class="close"><i
                                                class="svg-icon svg-icon-negative-filled svg-icon-size-24 svg-icon-color-gray-500"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Zm3.707-13.707a1 1 0 0 1 0 1.414L13.414 12l2.293 2.293a1 1 0 0 1-1.414 1.414L12 13.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L10.586 12 8.293 9.707a1 1 0 0 1 1.414-1.414L12 10.586l2.293-2.293a1 1 0 0 1 1.414 0Z">
                                                    </path>
                                                </svg></i></button>
                                    </div>
                                    <div class="modal-body"></div> <!---->
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="d-md-none unified-doctor-header-buttons">
                        <div class="mr-1">
                        </div>

                        <div data-hide-on-saas-booking-widget="">
                            <div
                                class="d-flex justify-content-between justify-content-sm-start unified-doctor-header-buttons__mobile">
                                <a role="button" class="btn btn-primary btn-sm-block btn-lg mt-1 mr-1"
                                    data-id="book-visit-btn" data-hide-on-saas-booking-widget=""
                                    data-action="show-calendar" data-context="book a visit" data-ga-event="click"
                                    data-ga-category="Book a visit button - commercial doctor profile"
                                    data-ga-action="Click" data-ga-label="Top of the profile" data-ga-interaction="true"
                                    data-patient-app-event-name="start-booking-flow"
                                    data-patient-app-selector="patient-app-event">
                                    <i class="svg-icon svg-icon-calendar svg-icon-size-18 mr-0-5"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M6 3a1 1 0 0 1 2 0v1h8V3a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1V3ZM5 9v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9H5Zm2 3.5a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm4 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm5-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2ZM8 15a1 1 0 1 0 0 2 1 1 0 0 0 0-2Zm3 1a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm5-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2Z">
                                            </path>
                                        </svg></i> <span>Prenota una visita</span>
                                </a>




                            </div>


                            <div class="mt-1 mr-1" data-id="ask-private-question-wrapper">
                                <a href="#" class="btn btn-light btn-lg btn-block" data-id="ask-private-question"
                                    data-doctor-id="136593" data-ga-event="click" data-ga-action="click"
                                    data-modal-id="ask-private-question-app"
                                    data-ga-category="Start chat conversation button - commercial doctor profile"
                                    data-ga-label="Top of the profile">
                                    <i class="svg-icon svg-icon-bubble-chat-texting svg-icon-size-18 mr-0-5"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M20 2H4c-1.1 0-1.99.9-1.99 2l-.008 17.23c0 1.026 1.36 1.388 1.868.497L6 18h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2ZM9 10a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z">
                                            </path>
                                        </svg></i>
                                    <span>Invia messaggio</span>
                                </a>
                            </div>



                        </div>


                        <div class="m-2 mr-3 hidden" data-id="saas-booking-management-wrapper-panel">
                            <div class="card card-shadow-1 mb-1 card-border">
                                <div class="card-body" data-id="saas-booking-management-wrapper"
                                    data-unveil-selector="[data-id='saas-booking-management-wrapper-panel']"
                                    data-visible-on="xs"></div>
                            </div>
                        </div>
                    </div>

                    <div class="unified-doctor-header-buttons__visit-wrapper bg-white d-block d-sm-none w-100 object-scrollspy"
                        data-id="book-visit-wrapper-btn" style="bottom: 0px;">
                        <a role="button" class="btn btn-primary btn-sm-block btn-lg mt-1 mr-1" data-id="book-visit-btn"
                            data-hide-on-saas-booking-widget="" data-action="show-calendar" data-context="book a visit"
                            data-ga-event="click" data-ga-category="Book a visit button - commercial doctor profile"
                            data-ga-action="Click" data-ga-label="Floating button" data-ga-interaction="true"
                            data-patient-app-event-name="start-booking-flow"
                            data-patient-app-selector="patient-app-event">
                            <i class="svg-icon svg-icon-calendar svg-icon-size-18 mr-0-5"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M6 3a1 1 0 0 1 2 0v1h8V3a1 1 0 1 1 2 0v1h1a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1V3ZM5 9v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9H5Zm2 3.5a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm4 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm5-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2ZM8 15a1 1 0 1 0 0 2 1 1 0 0 0 0-2Zm3 1a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm5-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2Z">
                                    </path>
                                </svg></i> <span>Prenota una visita</span>
                        </a>

                    </div>


                    <div data-hide-on-saas-booking-widget="">
                        <div class="text-center d-sm-none mt-1">
                            <span data-id="doctor-header-reminders">
                                <div class="urgency-reminder text-muted small"
                                    id="urgency-reminder-last-30days-page-views">
                                    <div class="text-rotator" data-ui="text-rotator"
                                        data-text="650 visualizzazioni profilo negli ultimi 30 gg.
;Servizio di prenotazione gratuito"
                                        data-speed="2500">Servizio di prenotazione gratuito</div>
                                </div>

                            </span>
                            <span data-id="doctor-header-reply-rate" class="d-none text-muted small">
                                Tempo medio di risposta: <span data-id="doctor-header-reply-rate-details"
                                    class="text-success"></span>
                            </span>
                        </div>
                    </div>






                    <div data-id="patient-request-modal">
                        <patient-request-modal
                            :doctor="{
                                &
                                quot;
                                id & quot;: 136593, & quot;
                                fullName & quot;: & quot;
                                Carlo Rando & quot;, & quot;
                                profileName & quot;: & quot;
                                Prof.Carlo Rando & quot;, & quot;
                                photo & quot;: & quot
                                ;\
                                /\/s3-eu-west-1.amazonaws.com\/miodottore.it\/doctor\/5f58d7\/5f58d7aa0e9a7e4d85ec2ad8168b9ecf_140_square.jpg&quot;}"
                            :launch-on-mounted="true"
                            :patient="{
                                &
                                quot;
                                id & quot;: null, & quot;
                                name & quot;: & quot; & quot;, & quot;
                                email & quot;: null
                            }"
                            tracking-place="DOCTOR_PROFILE"
                            :appstore-images="{
                                &
                                quot;
                                googlePlayImg & quot;: & quot
                                ;\
                                /\/platform.docplanner.com\/img\/it\/infopages\/patient-app\/play.png?308928267&quot;,&quot;googlePlayUrl&quot;:&quot;https:\/\/play.google.com\/store\/apps\/details?id=it.docplanner&quot;,&quot;appStoreImg&quot;:&quot;\/\/platform.docplanner.com\/img\/it\/infopages\/patient-app\/appstore.png?1663281546&quot;,&quot;appStoreUrl&quot;:&quot;\/\/apps.apple.com\/us\/app\/miodottore-it\/id1064009280&quot;}">
                        </patient-request-modal>
                    </div>

                </div>

                <hr class="my-1">
                <div class="nav-responsive has-controls">
                    <ul class="nav nav-tabs d-flex pb-0" role="tablist" data-id="unified-profile-nav"
                        data-nav-menu="unified-profile-nav">

                        <li class="nav-item" role="presentation" data-ga-event="click"
                            data-ga-category="Tabs  - commercial doctor profile" data-ga-action="Click"
                            data-ga-label="profile-info" data-ga-interaction="true" data-nav-link="profile-info"
                            data-test-id="doctor-nav-profile-info">
                            <a class="nav-link active" href="#profile-info" data-nav-id="profile-info" data-toggle="tab"
                                role="tab">
                                Indirizzi
                            </a>
                        </li>

                        <li class="nav-item" role="presentation" data-ga-event="click"
                            data-ga-category="Tabs  - commercial doctor profile" data-ga-action="Click"
                            data-ga-label="profile-pricing" data-ga-interaction="true" data-nav-link="profile-pricing"
                            data-test-id="doctor-nav-profile-pricing">
                            <a class="nav-link" href="#profile-pricing" data-nav-id="profile-pricing" data-toggle="tab"
                                role="tab">
                                Prestazioni
                            </a>
                        </li>

                        <li class="nav-item" role="presentation" data-ga-event="click"
                            data-ga-category="Tabs  - commercial doctor profile" data-ga-action="Click"
                            data-ga-label="profile-reviews" data-ga-interaction="true" data-nav-link="profile-reviews"
                            data-test-id="doctor-nav-profile-reviews">
                            <a class="nav-link" href="#profile-reviews" data-nav-id="profile-reviews" data-toggle="tab"
                                role="tab">
                                Recensioni
                                (30) </a>
                        </li>

                        <li class="nav-item" role="presentation" data-ga-event="click"
                            data-ga-category="Tabs  - commercial doctor profile" data-ga-action="Click"
                            data-ga-label="profile-questions" data-ga-interaction="true"
                            data-nav-link="profile-questions" data-test-id="doctor-nav-profile-questions">
                            <a class="nav-link" href="#profile-questions" data-nav-id="profile-questions"
                                data-toggle="tab" role="tab">
                                Risposte ai pazienti
                                (16784) </a>
                        </li>

                        <li class="nav-item" role="presentation" data-ga-event="click"
                            data-ga-category="Tabs  - commercial doctor profile" data-ga-action="Click"
                            data-ga-label="profile-experience" data-ga-interaction="true"
                            data-nav-link="profile-experience" data-test-id="doctor-nav-profile-experience">
                            <a class="nav-link" href="#profile-experience" data-nav-id="profile-experience"
                                data-toggle="tab" role="tab">
                                Esperienze
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection
