{% extends "layout.twig.php" %}


{% block header %}
    {{parent()}}
    <div id="logo-header">
        <img src="{{path.getPath('image')}}bulle.png" id="bulle"/>
        <img src="{{path.getPath('image')}}logo.png" id="logo"/>
    </div>
{% endblock %}


{% block wrapper %}
    {{parent()}}
    <div id="fb-root"></div>
    <div id="fiole" class="transition"><img src="{{path.getPath('image')}}fiole.png" alt="fiole de vos choix"/></div>
    <div id="slide-1" class="slide active" data-index="1">
        <div class="intro-txt">
            <h1>QUEL MÉTIER DIGITAL POUR VOUS ?</h1>
            <p>Développeur, directeur artistique, journaliste multimédia, motion designer ? </p>
            <p>Participez à ce quizz pour déterminer quel est votre profil idéal !</p>
        </div>
        <div id="play">COMMENCEZ</div>
    </div>    
    <div id="slide-2" class="slide" data-index="2">
        <h2>SI VOUS ÊTIEZ UN ANIMAL ?</h2>
        <div class="command">
            <ul>
                <li class="choice motion transition" data-link='motion'>
                    <figure>
                        <img src="{{path.getPath('image')}}animaux/chat.png" alt="chat"/>
                        <figcaption>
                            <h4>UN CHAT</h4>
                            <p>Au fond de vous, <br/>
                                vous rêvez d’envahir <br/>
                                internet de vidéos cultes </p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice da transition" data-link='da'>
                    <figure>
                        <img src="{{path.getPath('image')}}animaux/ecureuil.png" alt="ecureuil"/>
                        <figcaption>
                            <h4>UN ÉCUREUIL</h4>
                            <p>Vous êtes élégant <br/>
                                et assez créatif pour<br/>
                                trouver les bons plans </p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice dev transition" data-link='dev'>
                    <figure>
                        <img src="{{path.getPath('image')}}animaux/corbeau.png" alt="corbeau"/>
                        <figcaption>
                            <h4>UN CORBEAU</h4>
                            <p>Car en plus d’avoir <br/>
                                un style mystérieux, <br/>
                                vous êtes intelligent</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice journal transition" data-link='journal'>
                    <figure>
                        <img src="{{path.getPath('image')}}animaux/souris.png" alt="souris"/>
                        <figcaption>
                            <h4>UNE SOURIS</h4>
                            <p>Vous savez toujours <br/>
                                vous faufiler là où<br/>
                                on ne vous attend pas</p>
                        </figcaption>
                    </figure>
                </li>
                <div class='clear'></div>
            </ul>
        </div>
    </div>
    <div id="slide-3" class="slide" data-index="3">
        <h2>SI VOUS ÊTIEZ UNE JUNK FOOD ?</h2>
        <div class="command">
            <ul>
                <li class="choice journal transition" data-link='journal'>
                    <figure>
                        <img src="{{path.getPath('image')}}fast_food/nouille.png" alt="nouille chinoise"/>
                        <figcaption>
                            <h4>DES NOUILLES CHINOISES</h4>
                            <p>Un goût d’exotisme <br/>
                                qui ne vous déplait pas</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice da transition" data-link='da'>
                    <figure>
                        <img src="{{path.getPath('image')}}fast_food/burger.png" alt="hamburger"/>
                        <figcaption>
                            <h4>UN HAMBURGER</h4>
                            <p>Un burger de qualité <br/>
                                s’il vous plait !</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice motion transition" data-link='motion'>
                    <figure>
                        <img src="{{path.getPath('image')}}fast_food/pizza.png" alt="pizza"/>
                        <figcaption>
                            <h4>UNE PIZZA</h4>
                            <p>Bon, vite réchauffée,<br/>
                                et bonne froide!</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice dev transition" data-link='dev'>
                    <figure>
                        <img src="{{path.getPath('image')}}fast_food/kebab.png" alt="kebab"/>
                        <figcaption>
                            <h4>UN KEBAB</h4>
                            <p>Votre grec vous aime<br/>
                                et vous le lui rendez bien</p>
                        </figcaption>
                    </figure>
                </li>
                <div class='clear'></div>
            </ul>
        </div>
    </div>
    <div id="slide-4" class="slide" data-index="4">
        <h2>SI VOUS ÉTIEZ UN SPORT ?</h2>
        <div class="command">
            <ul>
                <li class="choice dev transition" data-link='dev'>
                    <figure>
                        <img src="{{path.getPath('image')}}sport/console.png" alt="jeux vidéos"/>
                        <figcaption>
                            <h4>LES JEUX VIDÉOS</h4>
                            <p>Une active sportive oui !<br/>
                                Mais derrière un écran</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice motion transition" data-link='motion'>
                    <figure>
                        <img src="{{path.getPath('image')}}sport/skate.png" alt="skate"/>
                        <figcaption>
                            <h4>LE SKATE</h4>
                            <p>Muni de votre <br/>
                                caméra pour partager<br/>
                                vos exploits</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice journal transition" data-link='journal'>
                    <figure>
                        <img src="{{path.getPath('image')}}sport/plongee.png" alt="plongée sous-marine"/>
                        <figcaption>
                            <h4>LA PLONGÉE</h4>
                            <p>Car plonger dans <br/>
                                l’inconnu vous<br/>
                                passionne</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice da transition" data-link='da'>
                    <figure>
                        <img src="{{path.getPath('image')}}sport/velo.png" alt="vélo"/>
                        <figcaption>
                            <h4>LE VÉLO</h4>
                            <p>Pour aller plus vite<br/>
                                et être stylé sur<br/>
                                votre pignon fixe</p>
                        </figcaption>
                    </figure>
                </li>
                <div class='clear'></div>
            </ul>
        </div>
    </div>
    <div id="slide-5" class="slide" data-index="5">
        <h2>SI VOUS ÉTIEZ UN SUPER POUVOIR ?</h2>
        <div class="command">
            <ul>
                <li class="choice journal transition" data-link='journal'>
                    <figure>
                        <img src="{{path.getPath('image')}}superpouvoir/telepathe.png" alt="télépathie"/>
                        <figcaption>
                            <h4>LA TÉLÉPATHIE</h4>
                            <p>Pour savoir tous <br/>
                                les secrets des gens<br/>
                                qui vous entourent</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice motion transition" data-link='motion'>
                    <figure>
                        <img src="{{path.getPath('image')}}superpouvoir/temps.png" alt="temps"/>
                        <figcaption>
                            <h4>CONTRÔLER LE TEMPS</h4>
                            <p>Pour le figer et capturer<br/>
                                les plus beaux moments</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice dev transition" data-link='dev'>
                    <figure>
                        <img src="{{path.getPath('image')}}superpouvoir/vitesse.png" alt="super vitesse"/>
                        <figcaption>
                            <h4>LA RAPIDITÉ</h4>
                            <p>Pour pouvoir remplir <br/>
                                votre journée <br/>
                                au plus vite</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice da transition" data-link='da'>
                    <figure>
                        <img src="{{path.getPath('image')}}superpouvoir/controle.png" alt="persuasion"/>
                        <figcaption>
                            <h4>LA PERSUASION</h4>
                            <p>Avoir toujours <br/>
                                raison quoi qu’il arrive,<br/>
                                un grand pouvoir !</p>
                        </figcaption>
                    </figure>
                </li>
                <div class='clear'></div>
            </ul>
        </div>
    </div>
    <div id="slide-6" class="slide" data-index="6">
        <h2>SI VOUS ÉTIEZ UN JEU ?</h2>
        <div class="command">
            <ul>
                <li class="choice motion transition" data-link='motion'>
                    <figure>
                        <img src="{{path.getPath('image')}}jeux/viking.png" alt="jeu de rôle"/>
                        <figcaption>
                            <h4>UN JEU DE RÔLE</h4>
                            <p>Vous aimez inventer <br/>
                                des histoires et<br/>
                                les faire vivre</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice da transition" data-link='da'>
                    <figure>
                        <img src="{{path.getPath('image')}}jeux/dessin.png" alt="dessin"/>
                        <figcaption>
                            <h4>LE DESSIN</h4>
                            <p>Quel meilleur moyen <br/>
                                de libérer votre<br/>
                                créativité ?</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice journal transition" data-link='journal'>
                    <figure>
                        <img src="{{path.getPath('image')}}jeux/cluedo.png" alt="cluedo"/>
                        <figcaption>
                            <h4>LE CLUEDO</h4>
                            <p>Pour égayer votre<br/>
                                curiosité et votre<br/>
                                réflexion</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice dev transition" data-link='dev'>
                    <figure>
                        <img src="{{path.getPath('image')}}jeux/lego.png" alt="legos"/>
                        <figcaption>
                            <h4>LES LEGOS</h4>
                            <p>Car vous êtes<br/>
                                un boss pour construire<br/>
                                un bon projet</p>
                        </figcaption>
                    </figure>
                </li>
                <div class='clear'></div>
            </ul>
        </div>
    </div>  
    <div id="slide-7" class="slide" data-index="7">
        <h2>SI VOUS ÉTIEZ UNE SERIE ?</h2>
        <div class="command">
            <ul>
                <li class="choice da transition" data-link='da'>
                    <figure>
                        <img src="{{path.getPath('image')}}serie/madmen.png" alt="mad men"/>
                        <figcaption>
                            <h4>MAD MEN</h4>
                            <p>La classe, du whisky,<br/>
                                et des créatifs<br/>
                                aguichés</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice journal transition" data-link='journal'>
                    <figure>
                        <img src="{{path.getPath('image')}}serie/les-experts.png" alt="les experts"/>
                        <figcaption>
                            <h4>LES EXPERTS</h4>
                            <p>Comme Horatio,<br/>
                                aucune énigme<br/>
                                ne vous fait peur</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice motion transition" data-link='motion'>
                    <figure>
                        <img src="{{path.getPath('image')}}serie/southpark.png" alt="South park"/>
                        <figcaption>
                            <h4>SOUTH PARK</h4>
                            <p>Du fun et un style <br/>
                                unique</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice dev transition" data-link='dev'>
                    <figure>
                        <img src="{{path.getPath('image')}}serie/bigbang.png" alt="big bang theory"/>
                        <figcaption>
                            <h4>BIG BANG THEORY</h4>
                            <p>Les clichés vous exaspèrent<br/>
                                mais pas quand ils <br/>
                                sont aussi drôles!</p>
                        </figcaption>
                    </figure>
                </li>
                <div class='clear'></div>
            </ul>
        </div>
    </div>
    <div id="slide-8" class="slide" data-index="8">
        <h2>SI VOUS ÉTIEZ UNE VILLE ?</h2>
        <div class="command">
            <ul>
                <li class="choice motion transition" data-link='motion'>
                    <figure>
                        <img src="{{path.getPath('image')}}destination/tokyo.png" alt="Tokyo"/>
                        <figcaption>
                            <h4>TOKYO</h4>
                            <p>Le Japon c’est un peu <br/>
                                le style ultime pour<br/>
                                les dessins animés</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice journal transition" data-link='journal'>
                    <figure>
                        <img src="{{path.getPath('image')}}destination/rio.png" alt="Rio de Janeiro"/>
                        <figcaption>
                            <h4>RIO</h4> 
                            <p>Une ville qui bouge,<br/>
                                mystérieuse et<br/>
                                pleine de secrets.</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice dev transition" data-link='dev'> 
                    <figure>
                        <img src="{{path.getPath('image')}}destination/sanfrancisco.png" alt="San Francisco"/>
                        <figcaption>
                            <h4>SAN FRANCISCO</h4>
                            <p>Pour être au plus près<br/>
                                de la Silicon Valley<br/>
                                et sa technologie</p>
                        </figcaption>
                    </figure>
                </li>
                <li class="choice da transition" data-link='da'>
                    <figure>
                        <img src="{{path.getPath('image')}}destination/londres.png" alt="Londres"/>
                        <figcaption>
                            <h4>LONDRES</h4>
                            <p>Une ville culturelle,<br/>
                                artistique et toujours<br/>
                                à la pointe des tendances</p>
                        </figcaption>
                    </figure>
                </li>
                <div class='clear'></div>
            </ul>
        </div>
    </div>
    <div id="slide-9" class="slide" data-index="9">
        <div id='JCVD'>
            <img src='{{path.getPath('image')}}vandamme.png' alt='jean-claude van damme'/>
        </div>
        <h2>QUE PENSEZ VOUS <br/>DE JEAN CLAUDE VAN DAMME ?</h2>
        <div class="command">
            <ul>
                <li class="choice dev transition" data-link='dev'>
                    <h4>JE M’EN FOU</h4>
                </li>
                <li class="choice da transition" data-link='da'>
                    <h4>UN VRAI GÉNIE</h4>
                </li>
                <li class="choice journal transition" data-link='journal'>
                    <h4>UN SUJET QUI MÉRITE RÉFLEXION</h4>
                </li>
                <li class="choice motion transition" data-link='motion'>
                    <h4>C’ÉTAIT MIEUX AVANT</h4>
                </li>
                <div class='clear'></div>
            </ul>
        </div>
    </div>
    <div id="final" class="slide">
        <h2>VOUS ÊTES ...</h2>
        <div id="dev" class="result">
            <div class="box-result">
                <p class="score"></p>
                <h4>DÉVELOPPEUR</h4>
                <p>Internet n’a pas de secrets pour vous! Et si il en avait, vous les découvrirez</p>
            </div>
        </div>
        <div id="motion" class="result">
            <div class="box-result">
                <p class="score"></p>
                <h4>MOTION DESIGNER</h4>
                <p>Vous pouvez imaginer un monde et le faire vivre</p>
            </div>
        </div>
        <div id="journal" class="result">
            <div class="box-result">
                <p class="score"></p>
                <h4>JOURNALISTE MULTIMÉDIA</h4>
                <p>Avide de connaissances sur le monde qui vous entoure</p>
            </div>
        </div>
        <div id="da" class="result">
            <div class="box-result">
                <p class="score"></p>
                <h4>DIRECTEUR ARTISTIQUE</h4>
                <p>Vous bouillonnez d’idées, vous êtes toujours à la pointe.</p>
            </div>
        </div>
        <div id="social-links" class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
    </div>
    <nav id="link-bar">
        <ul>
            {% for i in range(1, 9) %} 
                <li data-id="{{i}}"></li>
            {% endfor %}
        </ul>
    </nav>
{% endblock %}


{% block footer %}
    {{parent()}}   
{% endblock %}


{% block css %}
    {{parent()}}
    <link rel='stylesheet' href="{{path.getPath('css')}}home.css" type='text/css' media='all' />
{% endblock %}


{% block script %}
    {{parent()}}
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.6/TweenMax.min.js"></script>
    <script type="text/javascript" src="{{path.getPath('js')}}home.js"></script>
{% endblock %}