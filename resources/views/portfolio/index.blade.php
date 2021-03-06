@extends('layout')

@section('title', 'Portfólio ' . $profile['name'])

@section('content')
@section('body_class', 'profile')

<div class="container container-wide">
    <nav class="langs">
        <a href="/pt/portfolio/{{ $profile['slug'] == 'roberto-hofstetter-dias' ? 'roberto-hofstetter-dias' : 'ricardo-hofstetter-dias' }}" class="{{app('translator')->getLocale() == 'pt' ? 'active' : ''}}">PT</a>
        <a href="/en/portfolio/{{ $profile['slug'] == 'roberto-hofstetter-dias' ? 'roberto-hofstetter-dias' : 'ricardo-hofstetter-dias' }}" class="{{app('translator')->getLocale() == 'en' ? 'active' : ''}}">EN</a>
    </nav>
</div>

<section class="profile container container-wide" id="profile" itemscope itemtype="http://schema.org/Person">
    <!-- particles.js container --> 
    <div id="particles-js"></div>    
    <div class="row">
        <div class="three columns">
            <a class="back-link" href="/{{app('translator')->getLocale()}}">< Home</a>
            <a class="back-link profile-roberto" href="/{{app('translator')->getLocale()}}/portfolio/{{ $profile['slug'] == 'roberto-hofstetter-dias' ? 'ricardo-hofstetter-dias' : 'roberto-hofstetter-dias' }}">
                @if(app('translator')->getLocale() == 'en')
                    Check {{str_replace('Hofstetter Dias', '', ($profile['name'] == 'Roberto Hofstetter Dias' ? 'Ricardo' : 'Roberto' )) }}'s profile
                @else
                    Ver perfil {{ str_replace('Hofstetter Dias', '', ($profile['name'] == 'Roberto Hofstetter Dias' ? 'Ricardo' : 'Roberto' )) }}
                @endif
            </a>
        </div>
        <div class="nine columns character-info">
            <div class="two columns">
                <img class="image u-max-full-width" src="/../images/{{ $profile['slug'] }}-profile-face.jpg" />
            </div>
            <div class="ten columns">
                <ul class="list twelve columns">
                    <li class="list-item buffs">buffs</li>
                    @foreach($profile['buffs'] as $key => $buff)
                    <li class="list-item {{$buff}}">{{$buff}}</li>
                    @endforeach                                                   
                </ul>
                <div class="twelve columns">
                    <h1 class="name" itemprop="name">{{ $profile['name'] }}</h1>
                </div>
                <div class="twelve columns">
                    <span class="status" itemprop="jobTitle">{{ $profile['role'] }}</span>
                </div>
            </div>
        </div>  
    </div>  

    <div class="row">
        <!-- left column -->   
        @include('includes.menu')       

        <!-- right column -->
        <div class="nine columns character-text">                      
            <!-- ABOUT -->
            <section id="character-about" class="row character-text-content visible">
                <h2>@lang('messages.menu_about')</h2> 
                {!! $profile['about_' . app('translator')->getLocale()] !!}                                             
            </section>

            <!-- FRONTEND -->
            <section id="character-frontend" class="twelve columns character-text-content">    
                <h2>Front-end</h2>                                                                                            
                <ul class="list-languages twelve columns">
                    @foreach($profile['frontend'] as $key => $value)
                    <li class="one-third column list-languages-item">
                        <span class="twelve columns list-item-title">{{ $value['name'] }}</span>
                        <img src="/../images/logos/{{ $value['image'] }}" class="" width="{{ $value['width'] }}" alt="{{ $value['name'] }}" title="{{ $value['name'] }}" />                                           
                    </li>
                    @endforeach          
                </ul>                
            </section>      

            <!-- BACKEND -->
            <section id="character-backend" class="twelve columns character-text-content">
                <h2>Back-end</h2>                                                                                                                   
                <ul class="list-languages twelve columns">
                    @foreach($profile['backend'] as $key => $value2)
                    <li class="one-third column list-languages-item">
                        <span class="twelve columns list-item-title">{{ $value2['name'] }}</span>
                        <img src="/../images/logos/{{ $value2['image'] }}" width="130" alt="{{ $value2['name'] }}" title="{{ $value2['name'] }}" />                        
                    </li>
                    @endforeach   
                </ul>              
            </section>      

            <!-- DBS -->
            <section id="character-dbs" class="twelve columns character-text-content">         
                <h2>@lang('messages.menu_databases')</h2>                                          
                <ul class="list-languages twelve columns">
                    @foreach($profile['bds'] as $key => $value3)
                    <li class="one-third column list-languages-item">
                        <span class="twelve columns list-item-title">{{ $value3['name'] }}</span>
                        <img class="u-max-full-width" src="/../images/logos/{{ $value3['image'] }}" width="{{ $value3['width'] }}" alt="{{ $value3['name'] }}" title="{{ $value3['name'] }}" />                        
                    </li>
                    @endforeach                       
                </ul>                       
            </section>

            <!-- FERRAMENTAS -->
            <section id="character-tools" class="twelve columns character-text-content">
                <h2>@lang('messages.menu_tools')</h2>                                                   
                <ul class="list-tools twelve columns">
                    @foreach($profile['tools'] as $key => $value4)
                    <li class="one-third column list-languages-item">
                        <span class="twelve columns list-item-title">{{ $value4['name'] }}</span>
                        <img class="u-max-full-width" src="/../images/logos/{{ $value4['image'] }}" width="{{ $value4['width'] }}" alt="{{ $value4['name'] }}" title="{{ $value4['name'] }}" />                        
                    </li>
                    @endforeach                       
                </ul>                       
            </section>   

            <!-- Soft Skills -->
            <section id="character-soft-skills" class="twelve columns character-text-content">
                <h2>Soft Skills</h2>                                                   
                <ul class="list-tools twelve columns">
                    @foreach($profile['soft_skills'] as $key => $value6)
                    <li class="one-third column list-languages-item">
                        <span class="twelve columns list-item-title">{{ $value6['name_'. app('translator')->getLocale()] }}</span>                        
                    </li>
                    @endforeach                       
                </ul>                       
            </section>        

            <!-- PORTFOLIO --> 
            <section id="character-works" class="twelve columns character-text-content">
                <h2>@lang('messages.menu_works')</h2>                                                   
                <div class="list-works row">
                    @foreach($profile['works'] as $key => $value5)
                    <div class="list-works-item twelve columns">
                        
                        <div class="three columns container-image">
                            @if (isset($value5['link']))
                            <a href="{{ $value5['link'] }}" target="_blank" class="image">
                                <img src="/../images/trabalhos/{{$profile['slug']}}/{{ $value5['image'] }}" class="u-max-full-width" />
                            </a>                        
                            @else
                                <img src="/../images/trabalhos/{{$profile['slug']}}/{{ $value5['image'] }}" class="u-max-full-width" />
                            @endif  
                        </div>
                        
                        <div class="nine columns container-right">                                                    
                            <div class="twelve columns top">
                                @if (isset($value5['link']))
                                <a href="{{ $value5['link'] }}" target="_blank" class="title-link">
                                    <h4 class="title">{{ $value5['name'] }}</h4>
                                </a>
                                <a href="{{ $value5['link'] }}" target="_blank" class="access-link">@lang('messages.works_access_link')</a>
                                @else
                                <a href="javascript:void(0);" target="_blank" class="title-link">
                                    <h4 class="title">{{ $value5['name'] }}</h4>
                                </a>
                                @endif
                            </div>
                            <div class="twelve columns">
                                <p class="text">
                                    {!! $value5['text_'. app('translator')->getLocale()] !!}
                                </p>
                            </div>                            
                            <div class="twelve columns">
                                <h5 class="subtitle">@lang('messages.works_involvment')</h5>
                                <ul class="list">
                                    @foreach($value5['involvement'] as $key => $involvment)
                                    <li class="list-item">{{ $involvment }}</li>
                                    @endforeach                                                                                                           
                                </ul>
                            </div>                        
                        </div>                        
                    </div>   
                    @endforeach                                    
                </div>                       
            </section>   

            <!-- CONTACTS -->
            <section id="character-contacts" class="character-text-content">                  
                <h2>@lang('messages.menu_contacts')</h2>                                                 
                <div class="row">
                    <h3 class="title">@lang('messages.contacts_intro')</h3>

                    @if (isset($errors) && $errors->any())
                        <div class="alert alert-danger six columns">
                            <ul class="contact-errors-list">
                                @foreach ($errors->all() as $error)
                                    <li class="contact-errors-list-item">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- will be used to show any messages -->
                    @if (isset($success))
                        <div id="msg-success" class="alert alert-success twelve columns">{{ $success }}</div>
                    @endif

                    <!-- will be used to show any messages -->
                    @if (isset($error))
                        <div id="msg-error" class="alert alert-danger twelve columns">{{ $error }}</div>
                    @endif

                    <div class="list-contacts seven columns">                                        
                        {!! Form::open(['url' => app('translator')->getLocale() . '/portfolio/' . $profile['slug'], 'class' => 'form twelve columns']) !!}                                                                               
                            <input type="hidden" name="Para" value="{{ $profile['slug'] }}" />

                            <label for="input-name">@lang('messages.contacts_name_label')</label>
                            <input class="u-full-width" name="Nome" type="text" placeholder="Vivi Ornitier" id="input-name" required />

                            <label for="input-email">E-mail</label>
                            <input class="u-full-width" name="E-mail" type="email" placeholder="vivi@firaga.com" id="input-email" required />

                            <label for="input-message">@lang('messages.contacts_message_label')</label>
                            <textarea class="u-full-width" name="Mensagem" rows="10" id="input-message" required></textarea>
                            
                            <div class="g-recaptcha" data-sitekey="6LcTAg8UAAAAAAAP2uL3Ruu7XzSbglLAEG2BUMAj"></div>

                            <input class="btn-orange" type="submit" value="@lang('messages.contacts_send_button')">                                                                                                            
                        {!! Form::close() !!}
                    </div>                               
                </div>

                <div class="divider"></div>

                <div class="row">
                    <p>@lang('messages.contacts_social_text')</p>
                    <div class="social ten columns">
                        <div class="list-portfolio-item">
                            <a class="facebook-btn" href="{{ $profile['facebook'] }}" target="_blank">                            
                                <svg class="i-svg" height="50" version="1.1" width="50" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 50 50" space="preserve" data-icon="facebook,"><desc>Created with Snap</desc><defs></defs><path d="M27.845,47.469V27.81h8.426l1.404-8.425h-9.83v-4.213c0-2.81,1.406-4.213,4.213-4.213h4.213V2.531 c-1.405,0-4.55,0-7.021,0c-7.021,0-9.83,4.213-9.83,11.234v5.618h-8.425v8.424h8.425v19.661H27.845L27.845,47.469z" fill="#ffffff"></path></svg>
                                Facebook
                            </a>
                        </div>
                        
                        <div class="list-portfolio-item">
                            <a class="linkedin-btn" href="{{ $profile['linkedin'] }}" target="_blank">                            
                                <svg class="i-svg" height="50" version="1.1" width="50" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 50 50" space="preserve" data-icon="facebook,"><desc>Created with Snap</desc><defs></defs><path d="M13.83,41.668H5.401V13.571h8.429V41.668z M44.737,41.668h-8.429V26.66c0-3.912-1.394-5.857-4.154-5.857 c-2.189,0-3.577,1.086-4.274,3.273c0,3.545,0,17.592,0,17.592h-8.431c0,0,0.115-25.288,0-28.097h6.656l0.514,5.619h0.175 c1.729-2.81,4.489-4.713,8.275-4.713c2.881,0,5.207,0.801,6.985,2.815c1.794,2.014,2.684,4.713,2.684,8.514V41.668z M9.615,2.333 c2.404,0,4.357,1.888,4.357,4.214c0,2.33-1.953,4.214-4.357,4.214c-2.403,0-4.351-1.885-4.351-4.214 C5.264,4.22,7.212,2.333,9.615,2.333z" fill="#ffffff"></path></svg>
                                LinkedIn                            
                            </a>
                        </div>

                        <div class="list-portfolio-item">
                            <a class="github-btn" href="{{ $profile['github'] }}" target="_blank">                            
                               <svg class="i-svg" height="50" version="1.1" width="50" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 50 50" space="preserve" data-icon="facebook,"><desc>Created with Snap</desc><defs></defs><path d="M24.999,2.48c-12.75,0-23.087,10.338-23.087,23.09c0,10.199,6.613,18.854,15.791,21.907 c1.154,0.211,1.518-0.474,1.518-1.084c0-0.547,0.011-2.082,0-4.01c-6.422,1.398-7.753-3.038-7.753-3.038 c-1.048-2.671-2.562-3.377-2.562-3.377c-2.095-1.433,0.158-1.407,0.158-1.407c2.317,0.163,3.538,2.383,3.538,2.383 c2.059,3.522,5.403,2.505,6.717,1.916c0.21-1.491,0.808-2.51,1.468-3.087C15.66,35.188,10.27,33.211,10.27,24.361 c0-2.521,0.9-4.581,2.376-6.194c-0.239-0.584-1.031-2.932,0.226-6.112c0,0,1.939-0.62,6.349,2.369 c1.841-0.513,3.817-0.768,5.78-0.777c1.962,0.009,3.938,0.264,5.781,0.777c4.409-2.988,6.346-2.369,6.346-2.369 c1.258,3.18,0.466,5.528,0.229,6.112c1.478,1.613,2.373,3.673,2.373,6.194c0,8.872-5.397,10.823-10.543,11.392 c0.828,0.717,1.582,2.101,1.582,4.255c0,2.887,0,5.632,0,6.392c0,0.617,0.372,1.302,1.544,1.076 c9.167-3.059,15.776-11.708,15.776-21.905C48.089,12.818,37.75,2.48,24.999,2.48z" fill="#ffffff"></path></svg>
                                GitHub                            
                            </a>
                        </div>

                        <div class="list-portfolio-item">
                            E-mail: <a class="link" href="mailto:{{ $profile['email'] }}" itemprop="email">{{ $profile['email'] }}</a>
                        </div>
                    </div>
                </div>                                           
            </section>      
        </div>
    </div>        
</section>
@stop