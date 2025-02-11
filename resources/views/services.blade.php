@extends('layout.mainlayout')
@section('main')
    <!-- END nav -->
    <script>
        document.getElementById("servicenav").classList.add('active');
    </script>
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('/images/bgg2.png');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">

                    <h1 class="mb-3 bread"
                        style="color:white;font-family: 'Abril Fatface', cursive;
					font-size: 60px;text-shadow:7px 4px 9px black;">
                        Services</h1>
                </div>
            </div>
        </div>
    </section>

  
    <style>
        .light {
            background: #f3f5f7;
        }

        .light>a,
        .light>a:hover {
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        #pageHeaderTitle {
            margin: 2rem 0;
            text-transform: uppercase;
            text-align: center;
            font-size: 2.5rem;
        }

        /* Cards */
        .postcard {
            flex-wrap: wrap;
            display: flex;
            box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
            border-radius: 10px;
            margin: 0 0 2rem 0;
            overflow: hidden;
            position: relative;
            color: #fff;
        }

        .postcard.dark {
            background-color: #18151f;
        }

        .postcard.light {
            background-color: #e1e5ea;
        }

        .postcard .t-dark {
            color: #18151f;
        }

        .postcard a {
            color: inherit;
        }

        .postcard h1,
        .postcard .h1 {
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        .postcard .small {
            font-size: 80%;
        }

        .postcard .postcard__title {
            font-size: 1.75rem;
        }

        .postcard .postcard__img {
            max-height: 180px;
            width: 100%;
            object-fit: cover;
            position: relative;
        }

        .postcard .postcard__img_link {
            display: contents;
        }

        .postcard .postcard__bar {
            width: 50px;
            height: 10px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: #424242;
            transition: width 0.2s ease;
        }

        .postcard .postcard__text {
            padding: 1.5rem;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .postcard .postcard__preview-txt {
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: justify;
            height: 100%;
        }

        .postcard .postcard__tagbox {
            display: flex;
            flex-flow: row wrap;
            font-size: 14px;
            margin: 20px 0 0 0;
            padding: 0;
            justify-content: center;
        }

        .postcard .postcard__tagbox .tag__item {
            display: inline-block;
            background: rgba(83, 83, 83, 0.4);
            border-radius: 3px;
            padding: 2.5px 10px;
            margin: 0 5px 5px 0;
            cursor: default;
            user-select: none;
            transition: background-color 0.3s;
        }

        .postcard .postcard__tagbox .tag__item:hover {
            background: rgba(83, 83, 83, 0.8);
        }

        .postcard:before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: linear-gradient(325deg, #17a2b8, white 54%);
            opacity: 1;
            border-radius: 10px;
        }

        .postcard:hover .postcard__bar {
            width: 100px;
        }

        @media screen and (min-width: 769px) {
            .postcard {
                flex-wrap: inherit;
            }

            .postcard .postcard__title {
                font-size: 2rem;
            }

            .postcard .postcard__tagbox {
                justify-content: start;
            }

            .postcard .postcard__img {
                max-width: 300px;
                max-height: 100%;
                transition: transform 0.3s ease;
            }

            .postcard .postcard__text {
                padding: 3rem;
                width: 100%;
            }

            .postcard .media.postcard__text:before {
                content: "";
                position: absolute;
                display: block;
                background: #18151f;
                top: -20%;
                height: 130%;
                width: 55px;
            }

            .postcard:hover .postcard__img {
                transform: scale(1.1);
            }

            .postcard:nth-child(2n+1) {
                flex-direction: row;
            }

            .postcard:nth-child(2n+0) {
                flex-direction: row-reverse;
            }

            .postcard:nth-child(2n+1) .postcard__text::before {
                left: -12px !important;
                transform: rotate(4deg);
            }

            .postcard:nth-child(2n+0) .postcard__text::before {
                right: -12px !important;
                transform: rotate(-4deg);
            }
        }

        @media screen and (min-width: 1024px) {
            .postcard__text {
                padding: 2rem 3.5rem;
            }

            .postcard__text:before {
                content: "";
                position: absolute;
                display: block;
                top: -20%;
                height: 130%;
                width: 55px;
            }

            .postcard.light .postcard__text:before {
                background: #e1e5ea;
            }
        }

        /* COLORS */
        @media screen and (min-width: 699px) {


            .postcard ::before {

                background-image: linear-gradient(-322deg, #17a2b8, white 60%);
            }

            .postcard:nth-child(2n)::before {
                background-image: linear-gradient(18deg, #17a2b8, white 30%);
            }
        }
    </style>
    <section class="light mt-5">
        <div class="container py-2">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Our Services</span>
                    <h2 class="mb-2">The smartest way to book lawns</h2>
                </div>
            </div>
            <article class="postcard light blue">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="https://images.pexels.com/photos/2064505/pexels-photo-2064505.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title blue"><a href="#">Marrige</a></h1>
                    
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">Marriage is a lifelong union between two individuals, symbolizing their commitment, love, and partnership. It is a legal and social institution that brings together two people to create a shared life, support each other, and build a future together. Marriage represents the merging of families, legal rights and responsibilities, and a deep emotional bond between spouses. It is a significant milestone that holds cultural, religious, and personal significance, providing a framework for love, companionship, and mutual growth.</div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                        <li class="tag__item play blue">
                            <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                        </li>
                    </ul>
                </div>
            </article>
            <article class="postcard light red">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="https://media.istockphoto.com/id/1312502546/photo/happy-anniversary.jpg?s=612x612&w=0&k=20&c=JOX475lThvm71KDKKVVWBmuoJ6vaBbZxAsqDn4FsvIY=" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title red"><a href="#">Aniversary</a></h1>
                    
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">Anniversaries are often celebrated with joy and enthusiasm. Couples may plan special outings, romantic dinners, or heartfelt gestures to express their love and appreciation for one another. It is a time for reflection, reminiscing about shared memories, and reaffirming the bond that has grown stronger over time.</div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                        <li class="tag__item play red">
                            <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                        </li>
                    </ul>
                </div>
            </article>
            <article class="postcard light green">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="https://media.istockphoto.com/id/1346684222/photo/happy-birthday-3d-render-of-colorful-typography.jpg?b=1&s=170667a&w=0&k=20&c=EI5oCtUbxXdftFsN0436caH2Kre9-4j30L85g-9nDtA=" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title green"><a href="#">Birthday</a></h1>
                    
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">A birthday is a special day that marks the anniversary of a person's birth. It is a time to celebrate and commemorate the day a person came into the world. Birthdays are often marked with joy, festivities, and gatherings of family and friends.
On a birthday, people often receive well wishes, gifts, and expressions of love and appreciation from their loved ones. It is a time for reflection, gratitude, and celebrating milestones and personal growth.</div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                        <li class="tag__item play green">
                            <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                        </li>
                    </ul>
                </div>
            </article>
            <article class="postcard light yellow">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="https://images.pexels.com/photos/1456613/pexels-photo-1456613.jpeg?cs=srgb&dl=pexels-kumar-saurabh-1456613.jpg&fm=jpg" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title yellow"><a href="#">Ring-Ceremony</a></h1>
                    
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">A ring ceremony is a special event typically held during a wedding or engagement celebration. It is a symbolic ritual where rings are exchanged between the couple, representing their love, commitment, and unity.

During a ring ceremony, the couple publicly declares their devotion to each other and their intention to spend their lives together. The exchange of rings is often accompanied by heartfelt vows or promises, expressing their love and commitment.</div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                        <li class="tag__item play yellow">
                            <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                        </li>
                    </ul>
                </div>
            </article>
            <article class="postcard light green">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title green"><a href="#">Business Party</a></h1>
                    
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">A business party, also known as a corporate party or business event, is a social gathering organized by a company or organization for its employees, clients, partners, or stakeholders. It is a time to celebrate achievements, foster relationships, and create networking opportunities in a more relaxed and festive environment.

Business parties are often held to mark significant milestones, such as company anniversaries, product launches, successful projects, or reaching business targets. They can also serve as a platform for team-building exercises, recognizing employee contributions, or expressing gratitude to clients and partners.</div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                        <li class="tag__item play green">
                            <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                        </li>
                    </ul>
                </div>
            </article>
            <article class="postcard light yellow">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="https://media.istockphoto.com/id/1312139041/photo/learning-on-the-job.jpg?b=1&s=170667a&w=0&k=20&c=atR4O706RgAUh6U7SLz4-o6iDqdbHCeVLQTI3NxjL-Y=" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h1 class="postcard__title yellow"><a href="#">Seminar</a></h1>
                    
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">
A seminar is a focused educational event or gathering where a group of individuals with shared interests come together to exchange knowledge, ideas, and expertise on a specific topic. Typically, a seminar involves presentations, discussions, and interactions among participants.

The purpose of a seminar is to provide a platform for in-depth exploration and learning about a particular subject. It can be organized in various settings, such as academic institutions, professional conferences, or corporate environments. Seminars often feature subject matter experts, researchers, or experienced professionals who deliver presentations or lead discussions on their respective areas of expertise</div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                        <li class="tag__item play yellow">
                            <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                        </li>
                    </ul>
                </div>
            </article>
        </div>
    </section>



    <style>
        .services.services-2 .icon span {
            color: #ff008d;
        }

        .services.services-2 .icon {
            background: #ffffff;
        }
    </style>
    <section class="ftco-section ftco-degree-bg services-section img mx-md-5"
        style="background-image: url(/images/pexels-vidal-balielo-jr-14457444.jpg);">
        <div class="overlay" style="background-color: #ff2be5b3;"></div>
        <div class="container">
            <div class="row justify-content-start mb-md-0 mb-5">
                <div class="col-md-6 text-center heading-section heading-section-white ftco-animate">
                    <span class="subheading">Work flow</span>
                    <h2 class="mb-0" style="font-size: 60px;">How it works</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services services-2">
                                <div class="media-body py-md-4 text-center">
                                    <div class="icon mb-3 d-flex align-items-center justify-content-center">
                                        <span>01</span>
                                    </div>
                                    <h3>Evaluate Property</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                        regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services services-2">
                                <div class="media-body py-md-4 text-center">
                                    <div class="icon mb-3 d-flex align-items-center justify-content-center">
                                        <span>02</span>
                                    </div>
                                    <h3>Meet Your Agent</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                        regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services services-2">
                                <div class="media-body py-md-4 text-center">
                                    <div class="icon mb-3 d-flex align-items-center justify-content-center">
                                        <span>03</span>
                                    </div>
                                    <h3>Close the Deal</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                        regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services services-2">
                                <div class="media-body py-md-4 text-center">
                                    <div class="icon mb-3 d-flex align-items-center justify-content-center">
                                        <span>04</span>
                                    </div>
                                    <h3>Have Your Property</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                        regelialia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
