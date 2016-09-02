$(document).ready(function() {

    /*----------Proprietes (options) ----------*/
    /*--------initialisation----------*/

    $('body').show();
    $('#game').hide();
    $('#maingame').hide();
    $('#fight').hide();
    $('#getgame').hide();
    getgame();
    /*------------------------------*/
    /*--------fonctions-----------*/
    function getgame() {
        $('#getgame').show();
        $('#buttongetgame').click(function() {
            /*----------Proprietes (options) ----------*/
            $('#getgame').hide();
            var PLAYGROUND_WIDTH = 900;
            var PLAYGROUND_HEIGHT = 600;
            var REFRESH_RATE = 100;
            var state = "rpg";
            var basic = 'rgb(211, 211, 211)';
            var action = 'rgb(0, 128, 212)';
            var winpoint = 'rgb(0, 240, 61)';
            var losepoint = 'rgb(220, 0, 62)';
            var score = 0;
            var combo = 0;
            var table = [0, 0];
            var panneautxt = [
                "Danger : Pokeputes sauvages en vadrouilles",
                "C'est la saison des CupCakes !!",
                "Attention a vos fesses, le roi est de sortie",
                "Une hache a ete retrouvee dans les fesses du maire",
                "La peche est ouverte, preparer les seaux de lait.",
                "Combats de glaces illegaux apres 20h",
                "Ne vous frottez pas aux pokemons",
                "Un fou en costume de mickey a ete vu pres de l'ancienne ecole",
                "Je suis un panneeeeeeeeeaaaaaaaaauuuuuuuu !",
                'Un vehicule bloque la rue, son proprietaire est prie de le deplacer',
                'une piste de danse a ete installe dans la foret !'
            ];
            var rand=0;
            var texte = "";
            var idmap = "00";
            var cakeremoved = 0;
            var boostremoved = 0;
            var unboostremoved = 0;
            var winfight = false;
            var reponse = "";
            levelrate = 1000;
            /*les sons*/
            var soundenviro = new $.gameQuery.SoundWrapper("data/sound/enviro.wav", true);
            var combatsound = new $.gameQuery.SoundWrapper("data/sound/combat.wav", false);
            var soundmikey = new $.gameQuery.SoundWrapper("data/sound/mikey.wav", false);
            var soundmikeycreepy = new $.gameQuery.SoundWrapper("data/sound/mikeycreepy.wav", false);
            var soundwin = new $.gameQuery.SoundWrapper("data/sound/win.mp3", false);
            /*-----------------LE JEU------------*/


            $("#maingame").playground({height: PLAYGROUND_HEIGHT,
                width: PLAYGROUND_WIDTH, keyTracker: true});
            $.playground()
                    .addGroup('player', {posx: (PLAYGROUND_WIDTH / 2) - 24, posy: (PLAYGROUND_HEIGHT / 2) - 18, width: 36, height: 48})
                    .end()
                    .addGroup('00_object', {height: 0, width: 0})
                    .end()
                    .addGroup('01_object', {height: 0, width: 0})
                    .end()
                    .addGroup('10_object', {height: 0, width: 0})
                    .end()
                    .addGroup('11_object', {height: 0, width: 0})
                    .end()
                    .addGroup('20_object', {height: 0, width: 0})
                    .end()
                    .addGroup('30_object', {height: 0, width: 0})
                    .end()
                    .addGroup('00_mur', {height: 0, width: 0})
                    .end()
                    .addGroup('01_mur', {height: 0, width: 0})
                    .end()
                    .addGroup('10_mur', {height: 0, width: 0})
                    .end()
                    .addGroup('11_mur', {height: 0, width: 0})
                    .end()
                    .addGroup('fight', {height: 0, width: 0});
/*
            $('#son')[0].play();*/

            
// -----------------Les animations (images)-------------------
//on ajoute toutes les images necessaires   
            /*-----------les combats----------*/

            var playerfight = new $.gameQuery.Animation({
                imageURL: "img/perso_normal.png"
            });
            
            var badguyfight = new $.gameQuery.Animation({
                imageURL: "img/badguy_normal.png"

            });
            var playerup = new $.gameQuery.Animation({
                imageURL: "img/perso_haut.png"

            });
            var badguyup = new $.gameQuery.Animation({
                imageURL: "img/badguy_haut.png"

            });
            var playerdown = new $.gameQuery.Animation({
                imageURL: "img/perso_bas.png"

            });
            var badguydown = new $.gameQuery.Animation({
                imageURL: "img/badguy_bas.png"

            });
            var playerleft = new $.gameQuery.Animation({
                imageURL: "img/perso_gauche.png"

            });
            var badguyleft = new $.gameQuery.Animation({
                imageURL: "img/badguy_gauche.png"

            });
            var playerright = new $.gameQuery.Animation({
                imageURL: "img/perso_droite.png"

            });
            var badguyright = new $.gameQuery.Animation({
                imageURL: "img/badguy_droite.png"

            });
            var playerfail = new $.gameQuery.Animation({
                imageURL: "img/perso_echec.png"

            });
            var badguyfail = new $.gameQuery.Animation({
                imageURL: "img/badguy_echec.png"

            });



            /*----------normal RPG---------*/
            var playerface = new $.gameQuery.Animation({
                imageURL: "img/persoface.png",
                numberOfFrame: 3,
                delta: 35,
                rate: 120,
                type: $.gQ.ANIMATION_HORIZONTAL | $.gQ.ANIMATION_PINGPONG
            });
            var playerdos = new $.gameQuery.Animation({
                imageURL: "img/persodos.png",
                numberOfFrame: 3,
                delta: 35,
                rate: 120,
                type: $.gQ.ANIMATION_HORIZONTAL | $.gQ.ANIMATION_PINGPONG
            });
            var playergauche = new $.gameQuery.Animation({
                imageURL: "img/persogauche.png",
                numberOfFrame: 3,
                delta: 32,
                rate: 120,
                type: $.gQ.ANIMATION_HORIZONTAL | $.gQ.ANIMATION_PINGPONG
            });
            var playerdroite = new $.gameQuery.Animation({
                imageURL: "img/persodroite.png",
                numberOfFrame: 3,
                delta: 32,
                rate: 120,
                type: $.gQ.ANIMATION_HORIZONTAL | $.gQ.ANIMATION_PINGPONG
            });

            var vieillard = new $.gameQuery.Animation({
                imageURL: "img/vieillard.png"
            });
            var charizard = new $.gameQuery.Animation({
                imageURL: "img/dracaufeu.png"
            });

            var barbare = new $.gameQuery.Animation({
                imageURL: "img/barbare.png"
            });
            var glace = new $.gameQuery.Animation({
                imageURL: "img/glace.png"
            });
            
            /*--Les blocs d'arbres et de maison--*/
            var voiture = new $.gameQuery.Animation({
                imageURL: "img/voiture.png"
            });
            var arbre = new $.gameQuery.Animation({
                imageURL: "img/arbre.png"
            });
            var arbref1 = new $.gameQuery.Animation({
                imageURL: "img/f1.png"
            });
            var arbref2 = new $.gameQuery.Animation({
                imageURL: "img/f2.png"
            });
            var arbref3 = new $.gameQuery.Animation({
                imageURL: "img/f3.png"
            });
            var arbref4 = new $.gameQuery.Animation({
                imageURL: "img/f4.png"
            });
            var arbref5 = new $.gameQuery.Animation({
                imageURL: "img/f5.png"
            });
            var arbref6 = new $.gameQuery.Animation({
                imageURL: "img/f6.png"
            });
            var arbref7 = new $.gameQuery.Animation({
                imageURL: "img/f7.png"
            });
            var arbref8 = new $.gameQuery.Animation({
                imageURL: "img/f8.png"
            });
            var arbref9 = new $.gameQuery.Animation({
                imageURL: "img/f9.png"
            });
            var arbref10 = new $.gameQuery.Animation({
                imageURL: "img/f10.png"
            });
            var cake = new $.gameQuery.Animation({
                imageURL: "img/cake.png"
            });
            var roi = new $.gameQuery.Animation({
                imageURL: "img/roi.png"
            });
            var boost = new $.gameQuery.Animation({
                imageURL: "img/boost.png"
            });
            var unboost = new $.gameQuery.Animation({
                imageURL: "img/tasse.png"
            });
            var arbremort = new $.gameQuery.Animation({
                imageURL: "img/arbremort.png"
            });
            var arbref13 = new $.gameQuery.Animation({
                imageURL: "img/f13.png"
            });
            var arbref14 = new $.gameQuery.Animation({
                imageURL: "img/f14.png"
            });
            var arbref15 = new $.gameQuery.Animation({
                imageURL: "img/f15.png"
            });
            var badguy = new $.gameQuery.Animation({
                imageURL: "img/badboy.png"
            });
            var maison1 = new $.gameQuery.Animation({
                imageURL: "img/maison1.png"
            });
            var maison2 = new $.gameQuery.Animation({
                imageURL: "img/maison2.png"
            });
            var ecole = new $.gameQuery.Animation({
                imageURL: "img/ecole.png"
            });
            var key = new $.gameQuery.Animation({
                imageURL: "img/key.png"
            });
            var panneau = new $.gameQuery.Animation({
                imageURL: "img/panneau.png"
            });
            /*-------------LES SPRITES-----------*/
//on ajoute les sprites (elements) necessaires

            $("#player")
                    .addSprite('head', {
                height: 70,
                width: 33,
                animation: playerface
            })
                    .addSprite('top', {//sprite de collision
                height: 1,
                width: 24,
                posy: 1,
                posx: 5
            })
                    .addSprite('bottom', {//sprite de collision
                height: 1,
                width: 25,
                posy: 40,
                posx: 5
            })
                    .addSprite('left', {//sprite de collision
                height: 18,
                width: 1,
                posx: 1,
                posy: 15
            })
                    .addSprite('right', {//sprite de collision
                height: 18,
                width: 1,
                posx: 35,
                posy: 15
            });
            idmap = String(table[0]) + String(table[1]);
            mapgenerator(idmap);

            $.playground().startGame(function() { //on lance le jeu
                $('#game').show();
                $('#maingame').show();
                 soundenviro.play();
            });

            //On defini les creations de toutes le map au travers de fonctions pouet pouet
            function mapgenerator(idmap) {
                $('#fight').hide();
                $('.gQ_group:not(#player):not(#fight)').each(function() {
                    $(this).remove();
                });
                $('#maingame').css('background-image', 'url("img/background.jpg")');
                if (idmap === "00") {
                    $('#maingame').css('background-image', 'url("img/background2.jpg")');
                }
                if (idmap === "2-1") {
                    $('#maingame').css('background-image', 'url("img/background3.jpg")');
                }
                if (idmap === "10") {
                    $('#maingame').css('background-image', 'url("img/background4.jpg")');
                }

                $('#player').show();
                $.playground()
                        .addGroup(idmap + '_object', {height: 0, width: 0}).end().addGroup(idmap + '_mur', {height: 0, width: 0});
                $('#dialog').remove();
                switch (idmap) {
                    case '00':
                        if (texte === "") {
                            texte = "J'ai entendu parler d'une super fete dans le college desaffecte !<br/> Je vais voir si je peut aller y faire un tour.<br/>J'ai tellement hate d'y etre que je bouge dans tout les sens !";
                        }
                        $('#00_mur')
                                .addSprite('maison1', {
                            height: 309,
                            width: 900,
                            posx: 0,
                            posy: 370,
                            animation: maison1
                        }).addSprite('maison2', {
                            height: 309,
                            width: 900,
                            posx: 0,
                            posy: -50,
                            animation: maison2
                        }).addSprite('voiture', {
                            height: 114,
                            width: 134,
                            posx: 0,
                            posy: 255,
                            animation: voiture
                        });
                        break;
                    case '10':
                        texte = ""; 
                       $('#10_object')    .addSprite('panneau', {
                            height: 70,
                            width: 60,
                            posx: 630,
                            posy: 430,
                            animation: panneau
                        })
                                .addSprite('barbare', {
                            height: 67,
                            width: 50,
                            posx: 460,
                            posy: 120,
                            animation: barbare
                        })
                             .addSprite('glace', {
                            height: 190,
                            width: 188,
                            posx: 600,
                            posy: 70,
                            animation: glace
                        })
                            ;
                        $('#10_mur')
                                
                                .addSprite('arbref14', {
                            height: 123,
                            width: 433,
                            posx: 420,
                            posy: 550,
                            animation: arbref14
                        }) 
                           .addSprite('arbref1', {
                            height: 323,
                            width: 144,
                            posx: 800,
                            posy: -70,
                            animation: arbref1
                        })
                           .addSprite('arbremort', {
                            height: 86,
                            width: 88,
                            posx: 720,
                            posy: 470,
                            animation: arbremort
                        }) .addSprite('arbremort2', {
                            height: 86,
                            width: 88,
                            posx: 700,
                            posy: 0,
                            animation: arbremort
                        }) 
                           .addSprite('arbref1-2', {
                            height: 323,
                            width: 144,
                            posx: 800,
                            posy: 370,
                            animation: arbref1
                        }) 
                                .addSprite('1maison1', {
                            height: 309,
                            width: 420,
                            posx: 0,
                            posy: 470,
                            animation: maison1
                        })
                                .addSprite('1maison2', {
                            height: 309,
                            width: 550,
                            posx: -105,
                            posy: -50,
                            animation: maison2
                        })   .addSprite('arbref2', {
                            height: 200,
                            width: 80,
                            posx: 520,
                            posy: -100,
                            animation: arbref2
                        })      
                                .addSprite('arbref2-2', {
                            height: 200,
                            width: 80,
                            posx: 520,
                            posy: 70,
                            animation: arbref2
                        })  ;
                       

$('#1maison1').fliph(true);
$('#1maison2').fliph(true);
                        break;
                          case '20':
                        texte = "";
                        $('#20_mur')
                                .addSprite('arbref1', {
                            height: 323,
                            width: 124,
                            posx: 777,
                            posy: 50,
                            animation: arbref1
                        })
                                .addSprite('arbref2', {
                            height: 193,
                            width: 78,
                            posx: 710,
                            posy: 120,
                            animation: arbref2
                        })
                                .addSprite('arbref2-2', {
                            height: 193,
                            width: 78,
                            posx: 570,
                            posy: 100,
                            animation: arbref2
                        })
                                .addSprite('arbref3', {
                            height: 137,
                            width: 81,
                            posx: 160,
                            posy: 270,
                            animation: arbref3
                        })
                                .addSprite('arbref3-2', {
                            height: 137,
                            width: 81,
                            posx: 350,
                            posy: 30,
                            animation: arbref3
                        })
                                .addSprite('arbref3-3', {
                            height: 137,
                            width: 81,
                            posx: 850,
                            posy: -70,
                            animation: arbref3
                        })
                                .addSprite('arbref4', {
                            height: 211,
                            width: 212,
                            posx: 0,
                            posy: 370,
                            animation: arbref4
                        })
                                .addSprite('arbref5', {
                            height: 138,
                            width: 693,
                            posx: 0,
                            posy: 532,
                            animation: arbref5
                        })
                                .addSprite('arbref6', {
                            height: 131,
                            width: 158,
                            posx: 600,
                            posy: 450,
                            animation: arbref6
                        })
                                .addSprite('arbref6-2', {
                            height: 131,
                            width: 158,
                            posx: -20,
                            posy: 30,
                            animation: arbref6
                        })
                                .addSprite('arbref7', {
                            height: 92,
                            width: 214,
                            posx: 686,
                            posy: 538,
                            animation: arbref7
                        })
                                .addSprite('arbref8', {
                            height: 56,
                            width: 765,
                            posx: -70,
                            posy: 0,
                            animation: arbref8
                        })
                                .addSprite('arbref9', {
                            height: 234,
                            width: 226,
                            posx: 350,
                            posy: 140,
                            animation: arbref9
                        })
                                .addSprite('arbref10', {
                            height: 135,
                            width: 90,
                            posx: 0,
                            posy: 120,
                            animation: arbref10
                        });

                        if (cakeremoved === 0) {
                            $('#20_object')
                                    .addSprite('cake', {
                                height: 25,
                                width: 20,
                                posx: 250,
                                posy: 100,
                                animation: cake
                            });
                        }
                        $('#20_object')
                                .addSprite('charizard', {
                            height: 86,
                            width: 108,
                            posx: 450,
                            posy: 50,
                            animation: charizard
                        });
                        break;
                    case '30':
                        texte = "";
                        $('#30_mur')
                                .addSprite('2arbref6', {
                            height: 131,
                            width: 158,
                            posx: 400,
                            posy: 420,
                            animation: arbref6
                        })
                                .addSprite('2arbref9-3', {
                            height: 234,
                            width: 226,
                            posx: 700,
                            posy: -60,
                            animation: arbref9
                        })
                                .addSprite('2arbref9-4', {
                            height: 234,
                            width: 226,
                            posx: 700,
                            posy: 150,
                            animation: arbref9
                        }).addSprite('2arbre', {
                            height: 90,
                            width: 79,
                            posx: 851,
                            posy: 360,
                            animation: arbre
                        })

                                .addSprite('2arbremort', {
                            height: 88,
                            width: 86,
                            posx: 680,
                            posy: 350,
                            animation: arbremort
                        })
                                .addSprite('2arbref3', {
                            height: 137,
                            width: 81,
                            posx: 120,
                            posy: 30,
                            animation: arbref3
                        })
                                .addSprite('2arbref9-2', {
                            height: 234,
                            width: 226,
                            posx: -20,
                            posy: 140,
                            animation: arbref9
                        })
                                .addSprite('2arbref13', {
                            height: 228,
                            width: 462,
                            posx: 450,
                            posy: 420,
                            animation: arbref13
                        })
                                .addSprite('2arbref14', {
                            height: 123,
                            width: 633,
                            posx: -200,
                            posy: 540,
                            animation: arbref14
                        })
                                .addSprite('2arbref2', {
                            height: 193,
                            width: 78,
                            posx: 630,
                            posy: -70,
                            animation: arbref2
                        })
                                .addSprite('2arbref9-5', {
                            height: 234,
                            width: 226,
                            posx: 200,
                            posy: -100,
                            animation: arbref9
                        })
                                .addSprite('2arbref9-6', {
                            height: 234,
                            width: 226,
                            posx: 420,
                            posy: -110,
                            animation: arbref9
                        });
                        $('#30_object').addSprite('vieillard', {
                            height: 63,
                            width: 30,
                            posx: 420,
                            posy: 170,
                            animation: vieillard
                        }).addSprite('roi', {
                            height: 71,
                            width: 72,
                            posx: 20,
                            posy: 20,
                            animation: roi
                        });
                        if (($('#2arbremort').length) && reponse !== "") {

                            if (reponse !== 'Beige') {
                                texte = 'FAUX ! Vous ne sortirez jamais d\'ici vivant !!<br/>MWHAHAHAHAHAHAHAHAHAHAHAHAH MWHAAHAHHAHAHAHAHA *tousse tousse* ...';
                                $('#vieillard').xy(420, 150, 0);
                                $('#2arbremort').remove();

                                if (unboostremoved === 0) {
                                    $('#30_object')
                                            .addSprite('unboost', {
                                        height: 18,
                                        width: 21,
                                        posx: 820,
                                        posy: 390,
                                        animation: unboost
                                    });
                                }
                                $('#30_mur')
                                        .addSprite('2arbref4', {
                                    height: 211,
                                    width: 212,
                                    posx: 0,
                                    posy: 360,
                                    animation: arbref4
                                });
                                state = 'rpg';
                            }
                            else {
                                texte = 'Bien jouer, aller, maintenant, cul sec ! Apres ca, tu seras le dieu de la piste de danse !';
                                $('#2arbremort').remove();
                                $('#vieillard').xy(420, 150, 0);

                                if (boostremoved === 0) {
                                    $('#30_object').addSprite('boost', {
                                        height: 40,
                                        width: 10,
                                        posx: 820,
                                        posy: 390,
                                        animation: boost
                                    });
                                }
                                state = 'rpg';
                            }
                        } else {
                            texte = "";
                            $('#dialog').remove();
                        }


                        break;

                    case '2-1':
                        if (texte === "") {
                            texte = "Voici l'ecole !! Yay !.";
                        }
                        $('#2-1_mur')
                                .addSprite('ecole', {
                            height: 316,
                            width: 493,
                            posx: 00,
                            posy: -60,
                            animation: ecole
                        })
                                .addSprite('3arbref6', {
                            height: 131,
                            width: 158,
                            posx: 485,
                            posy: 100,
                            animation: arbref6
                        }).addSprite('3arbref15', {
                            height: 231,
                            width: 86,
                            posx: -10,
                            posy: 265,
                            animation: arbref15
                        })
                                .addSprite('3arbref5', {
                            height: 138,
                            width: 693,
                            posx: 0,
                            posy: 477,
                            animation: arbref5
                        })
                                .addSprite('3arbref13', {
                            height: 228,
                            width: 462,
                            posx: 600,
                            posy: 100,
                            animation: arbref13
                        })
                                .addSprite('3arbref2-2', {
                            height: 193,
                            width: 78,
                            posx: 830,
                            posy: 300,
                            animation: arbref2
                        })
                                .addSprite('3arbref2', {
                            height: 193,
                            width: 78,
                            posx: 830,
                            posy: 430,
                            animation: arbref2
                        });
                        if (winfight !== true) {
                            $('#2-1_object').addSprite('badguy', {
                                height: 63,
                                width: 30,
                                posx: 287,
                                posy: 275,
                                animation: badguy
                            });
                        }
                        if (winfight === true) {
                            $('#2-1_object').addSprite('key', {
                                height: 10,
                                width: 15,
                                posx: 287,
                                posy: 275,
                                animation: key
                            }).addSprite('badguy', {
                                height: 63,
                                width: 30,
                                posx: 367,
                                posy: 265,
                                animation: badguy
                            });
                        }

                        break;

                    default:
                        
                        $('#player').xy(420, 275, 0);
                        state="enigme";
                           if (texte === "") {
                            texte = "Vous n'avez rien a faire ici !";
                        }
                        $('.gQ_group:eq(3)')
                              .addSprite('defaultarbref9', {
                            height: 234,
                            width: 226,
                            posx: -5,
                            posy: -10,
                            animation: arbref9
                        })  .addSprite('defaultarbref9-1', {
                            height: 234,
                            width: 226,
                            posx: 220,
                            posy: -10,
                            animation: arbref9
                        })  .addSprite('defaultarbref9-2', {
                            height: 234,
                            width: 226,
                            posx: 440,
                            posy: -10,
                            animation: arbref9
                        })  .addSprite('defaultarbref9-3', {
                            height: 234,
                            width: 226,
                            posx: 665,
                            posy: -10,
                            animation: arbref9
                        })
                        
                        .addSprite('defaultarbref9-4', {
                            height: 234,
                            width: 226,
                            posx: -5,
                            posy: 200,
                            animation: arbref9
                        }) .addSprite('defaultarbref9-7', {
                            height: 234,
                            width: 226,
                            posx: 665,
                            posy: 200,
                            animation: arbref9
                        })
                        
                        .addSprite('defaultarbref9-8', {
                            height: 234,
                            width: 226,
                            posx: -5,
                            posy: 400,
                            animation: arbref9
                        })  .addSprite('defaultarbref9-9', {
                            height: 234,
                            width: 226,
                            posx: 220,
                            posy: 400,
                            animation: arbref9
                        })  .addSprite('defaultarbref9-10', {
                            height: 234,
                            width: 226,
                            posx: 440,
                            posy: 400,
                            animation: arbref9
                        })  .addSprite('defaultarbref9-11', {
                            height: 234,
                            width: 226,
                            posx: 665,
                            posy: 400,
                            animation: arbref9
                        });
                             
                        break;


                }

                $('#00_mur,#01_mur,#2-1_mur,#10_mur,#20_mur,#30_mur,#mur').children().addClass("mur");
                $('#00_object,#20_object,#01_object,#1-1_object,#10_object,#2-1_object,#30_object').children().addClass("objet , objetactive");
                $('#vieillard').attr('data-text', '- Pardon, je cherche un moyen de rentrer dans la vieille ecole. <br/> - Je suis le donneur d\'enigme, repond juste et tu trouveras ce que tu cherche !');
                $('#charizard').attr('data-text', 'Agrougrou !!<br/>Se frotter a un Dracaufeu etait une mauvaise idee');
                $('#cake').attr('data-text', 'Miam, gateau !');
                $('#badguy').attr('data-text', '- Tu ne peut pas rentrer ici ! <br/>Sauf si tu me bat sur mon terrain ... la danse !');
                $('#key').attr('data-text', 'Meilleure soiree du Moooooonde !!!!');
                $('#barbare').attr('data-text', 'Vous n\'auriez pas vu ma hache ?');
                $('#glace').attr('data-text', 'Glaces guerrieres ! 3 parfum ! 2 euro 50 ! Haut taux de coups critiques ! Cornet offert !');
                $('#panneau').attr('data-text', 'Vers la foret --><br/>'+panneautxt[rand]);
            }
            
            ;

            //on ajoute les classes et les id necessaires 
            $.playground().registerCallback(function() { //gestion des touches et collisions
                var x = $('#player').x();
                var y = $('#player').y();
                var newx = 0;
                var newy = 0;

                if (jQuery.gameQuery.keyTracker[37]) { //this is left! 
                    if (state === 'rpg') {
                        newx = -8;
                        if ($('#head').attr('data-playerstate') !== 'left') {
                            $('#head').setAnimation(playergauche, 'callback');
                            $('#head').attr('data-playerstate', 'left');
                        }
                    }
                    if (state === 'fight') {

                        if ($('#toucheleft').css('background-color') === action) {
                            $('#toucheleft').css('background-color', winpoint);
                            score = score + 100;
                            combo = combo + 1;
                            $('#win').text("+100").css('color', 'green').show();
                            $('#playerfight').setAnimation(playerleft, 'callback');
                        } else {

                            if ($('#toucheleft').css('background-color') !== winpoint) {
                                $('#toucheleft').css('background-color', losepoint);
                                score = score - 150;
                                combo = 0;
                                $('#win').text("-150").css('color', 'red').show();

                                $('#playerfight').setAnimation(playerfail, 'callback');
                            }
                        }

                    }
                    var left = $('#left').collision('.gQ_group, .mur');
                    if (left.length > 0) {
                        newx = 0;
                    }
                    var left2 = $('#left').collision('.gQ_group, .objet');
                    if (left2.length > 0) {
                        newx = 0;
                    }
                    var left3 = $('#left').collision('.gQ_group, .objetactive');
                    if (left3.length > 0) {
                        newx = 0;
                    }
                } else {
                    if ($('#toucheleft').css('background-color') !== action) {
                        $('#toucheleft').css('background-color', basic);
                    }
                }

                if (jQuery.gameQuery.keyTracker[39]) { //this is right! 
                    if (state === 'rpg') {
                        newx = 8;
                        if ($('#head').attr('data-playerstate') !== 'right') {
                            $('#head').setAnimation(playerdroite, 'callback');
                            $('#head').attr('data-playerstate', 'right');
                        }
                    }
                    if (state === 'fight') {
                        if ($('#toucheright').css('background-color') === action) {
                            $('#toucheright').css('background-color', winpoint);
                            score = score + 100;
                            combo = combo + 1;
                            $('#win').text("+100").css('color', 'green').show();
                            $('#playerfight').setAnimation(playerright, 'callback');
                        } else {

                            if ($('#toucheright').css('background-color') !== winpoint) {
                                $('#toucheright').css('background-color', losepoint);
                                score = score - 150;
                                combo = 0;
                                $('#win').text("-150").css('color', 'red').show();
                                $('#playerfight').setAnimation(playerfail, 'callback');
                            }
                        }
                    }
                    var right = $('#right').collision('.mur, .gQ_group');
                    if (right.length > 0) {
                        newx = 0;
                    }
                    var right2 = $('#right').collision('.gQ_group, .objet');
                    if (right2.length > 0) {
                        newx = 0;
                    }
                    var right3 = $('#right').collision('.gQ_group, .objetactive');
                    if (right3.length > 0) {
                        newx = 0;
                    }
                } else {
                    if ($('#toucheright').css('background-color') !== action) {
                        $('#toucheright').css('background-color', basic);
                    }
                }


                if (jQuery.gameQuery.keyTracker[38]) { //this is up! 
                    if (state === 'rpg') {
                        newy = -8;
                        if ($('#head').attr('data-playerstate') !== 'up') {
                            $('#head').setAnimation(playerdos, 'callback');
                            $('#head').attr('data-playerstate', 'up');
                        }
                    }
                    if (state === 'fight') {
                        if ($('#toucheup').css('background-color') === action) {
                            $('#toucheup').css('background-color', winpoint);
                            score = score + 100;
                            combo = combo + 1;
                            $('#win').text("+100").css('color', 'green').show();
                            $('#playerfight').setAnimation(playerup, 'callback');
                        } else {

                            if ($('#toucheup').css('background-color') !== winpoint) {
                                $('#toucheup').css('background-color', losepoint);
                                score = score - 150;
                                combo = 0;
                                $('#win').text("-150").css('color', 'red').show();
                                $('#playerfight').setAnimation(playerfail, 'callback');
                            }
                        }
                    }
                    if (state === 'enigme') {
                        var selection = $('#selected').index();
                        if (selection === 5) {
                            selection = 0;
                        }
                        if (selection === 2) {
                            selection = 3;
                        }
                        $('#selected').attr('id', '');
                        $('#enigma li').eq(selection + 1).attr("id", "selected");
                    }
                    var top = $('#top').collision('.mur, .gQ_group');
                    if (top.length > 0) {
                        newy = 0;
                    }
                    var top2 = $('#top').collision('.gQ_group, .objet');
                    if (top2.length > 0) {
                        newy = 0;
                    }
                    var top3 = $('#top').collision('.gQ_group, .objetactive');
                    if (top3.length > 0) {
                        newy = 0;
                    }
                } else {
                    if ($('#toucheup').css('background-color') !== action) {
                        $('#toucheup').css('background-color', basic);
                    }
                }


                if (jQuery.gameQuery.keyTracker[40]) { //this is down! 
                    if (state === 'rpg') {
                        newy = 8;
                        if ($('#head').attr('data-playerstate') !== 'down') {
                            $('#head').setAnimation(playerface, 'callback');
                            $('#head').attr('data-playerstate', 'down');
                        }
                    }
                    if (state === 'fight') {
                        if ($('#touchedown').css('background-color') === action) {
                            $('#touchedown').css('background-color', winpoint);
                            score = score + 100;
                            combo = combo + 1;
                            $('#win').text("+100").css('color', 'green').show();
                            $('#playerfight').setAnimation(playerdown, 'callback');
                        } else {
                            if ($('#touchedown').css('background-color') !== winpoint) {
                                $('#touchedown').css('background-color', losepoint);
                                score = score - 150;
                                combo = 0;
                                $('#win').text("-150").css('color', 'red').show();
                                $('#playerfight').setAnimation(playerfail, 'callback');
                            }
                        }
                    }
                    if (state === 'enigme') {
                        var selection = $('#selected').index();
                        if (selection === -1) {
                            selection = 4;
                        }
                        if (selection === 2) {
                            selection = 1;
                        }
                        $('#selected').attr('id', '');
                        $('#enigma li').eq(selection - 1).attr("id", "selected");

                    }
                    var bottom = $('#bottom').collision('.mur, .gQ_group');
                    if (bottom.length > 0) {
                        newy = 0;
                    }
                    var bottom2 = $('#bottom').collision('.gQ_group, .objet');
                    if (bottom2.length > 0) {
                        newy = 0;
                    }
                    var bottom3 = $('#bottom').collision('.gQ_group, .objetactive');
                    if (bottom3.length > 0) {
                        newy = 0;
                    }
                } else {
                    if ($('#touchedown').css('background-color') !== action) {
                        $('#touchedown').css('background-color', basic);
                    }
                }

                if (jQuery.gameQuery.keyTracker[40] === false && jQuery.gameQuery.keyTracker[37] === false && jQuery.gameQuery.keyTracker[38] === false && jQuery.gameQuery.keyTracker[39] === false) {
//si aucune touche n'est activee
                    //$('#head').gQ.Animation({type: $.gQ.ANIMATION_ONCE});
                }

                //changement de tableau
                if (x <= 0) {
                    table[0] = table[0] - 1;

                    idmap = String(table[0]) + String(table[1]);
                    mapgenerator(idmap);
                    $('#player').xy(855, y, 0);

                } else {
                    if (x >= 900) {
                        table[0] = table[0] + 1;
                        $('#player').xy(5, y, 0);

                        idmap = String(table[0]) + String(table[1]);
                        mapgenerator(idmap);
                    } else {
                        if (y <= 0) {
                            table[1] = table[1] - 1;
                            $('#player').xy(x, 555, 0);

                            idmap = String(table[0]) + String(table[1]);
                            mapgenerator(idmap);
                        } else {
                            if (y >= 600) {
                                table[1] = table[1] + 1;

                                idmap = String(table[0]) + String(table[1]);
                                mapgenerator(idmap);
                                $('#player').xy(x, 5, 0);
                            } else {
                                $('#player').xy(x + newx, y + newy, 0); // nouvelles positions du joueur
                                newx = 0;
                                newy = 0;
                            }
                        }
                    }
                }
                if (state === 'rpg') {
                    //fightgame('badguy', 1000,1000);
                }
                if (state === 'enigme') {
                    reponse = $('#selected').text();
                }
                if (state === 'fight') {
                    if (combo === 4) {
                        $('#combo').show();
                        combo = 0;
                        score = score + 50;
                        $('#win').text("+50").css('color', 'green').show();
                    }
                    $('#fightscore').text("Score : " + score);
                }
                if (state === 'rpg' && texte !== "" && !($('#dialog').length) || state === 'enigme' && texte !== "" && !($('#dialog').length)) {
                rand = Math.floor((Math.random() *  panneautxt.length));
            console.log(panneautxt[rand]);
                    $('#panneau').attr('data-text', 'Vers la foret --><br/>'+panneautxt[rand]);
                    $('#maingame').append("<div id='dialog'>" + texte + "<span class='little'>Espace pour quitter ou activer des objets</span></div>");
                }
                return REFRESH_RATE;
            }, REFRESH_RATE);

            $(document).keyup(function(e) {
                if (e.keyCode === 32) {//La touche espace, en dehors du timer, pour eviter le spam
                    if ($('#player').collision('.gQ_group , .objetactive').length > 0 && state === "rpg") { // si la liste est superieure a  0
                        texte = $($('#player').collision('.gQ_group , .objetactive')[0]).attr("data-text");
                        if (texte === "Miam, gateau !") {
                            REFRESH_RATE = 70;
                            $('#cake').remove();
                            cakeremoved = 1;
                        }
                        if (texte === "Glaces guerrieres ! 3 parfum ! 2 euro 50 ! Haut taux de coups critiques ! Cornet offert !") {
                           
                 soundmikey.play();
                        }
                        if (texte === "Agrougrou !!<br/>Se frotter a un Dracaufeu etait une mauvaise idee") {

                            if (e.keyCode === 32) {
                                table = [0, 0];
                                mapgenerator('00');
                                $('#player').xy(450, 300, 0);
                            }
                        }
                        if (texte === "Meilleure soiree du Moooooonde !!!!") {

                            if (e.keyCode === 32) {
                                REFRESH_RATE = 1;
                                table = [-1, 0];
                                mapgenerator('-10');
                                $('#player').xy(450, 300, 0);
                            }
                        }
                        if (texte === "- Tu ne peut pas rentrer ici ! <br/>Sauf si tu me bat sur mon terrain ... la danse !") {
                            var clic = 1;
                            $(document).keyup(function(e) {
                                if (clic === 1) {
                                    texte = "";
                                    if (e.keyCode === 32) {
                    fightgame('badguy', 700, 3000);
                                        clic = 0;
                                    }
                                }

                            });

                        }
                        if (texte === "- Pardon, je cherche un moyen de rentrer dans la vieille ecole. <br/> - Je suis le donneur d\'enigme, repond juste et tu trouveras ce que tu cherche !") {
                            state = 'enigme';
                            if (reponse === "") {
                                $(document).keyup(function(e) {
                                    if (e.keyCode === 32) {
                                        state = 'enigme';
                                        texte = 'Bien, voici ma question : Quelle est la couleur de ma voiture ?<br/>\n\
<ul id="enigma"><li id="selected" class="enigmechoice">Noire</li><li class="enigmechoice">Vert</li><br/><li class="enigmechoice">Beige</li><li class="enigmechoice">Marron</li></ul>';
                                        $(document).keyup(function(e) {

                                            if (e.keyCode === 32 && state === "enigme" && $('#2arbremort').length) {
                                                mapgenerator('30');

                                            }
                                            if (e.keyCode === 32 && $('#player').collision('.gQ_group , #boost').length > 0 && state === "rpg") {
                                                levelrate = 1000;
                                                texte = 'Je suis invulnerable !!! ... ou bourre, je sais pas trop ...';
                                                $('#boost').remove();
                                                boostremoved = 1;
                                            }
                                            if (e.keyCode === 32 && $('#player').collision('.gQ_group , #unboost').length > 0 && state === "rpg") {
                                                mapgenerator('00');
                                                $('#unboost').remove();
                                                unboostremoved = 1;

                                            }
                                        });

                                    }

                                });
                            }
                        }

                    }
                    else {
                        texte = "";
                        $('#dialog').remove();

                    }
                }


            });

            function fightgame(ennemyname, levelrate, scoremax) {
                var i=0;
                scoremax=2500;
                 soundenviro.stop();
                 combatsound.play();
                $('#fight').children().remove();
                score = 0;
                var iapoint = 0;

                state = 'fight';
                $('#fight')
                        .addSprite('playerfight', {
                    height: 544,
                    width: 332,
                    animation: playerfight,
                    posy: 150,
                    posx: 50
                }).addSprite(ennemyname + 'fight', {
                    height: 200,
                    width: 150,
                    animation: badguyfight,
                    posy: 180,
                    posx: 550
                });

                $('#player , .gQ_group').hide();
                $('#dialog').remove();
                $('#maingame').css('background-image', 'url("img/backgroundcombat.jpg")');
                $('#fight').fadeIn(2000);
                $('#' + ennemyname + 'fight').show();
                $('#playerfight').show();
                $('#fight').append("<div id='combo'></div><div id='win'></div><div id='fightscore'></div><ul><li class='touche' id='toucheup'></li><li class='touche' id='touchedown'></li><li id='toucheleft' class='touche'></li><li class='touche' id='toucheright'></li></ul>");

                $('#win').hide();
                $('#combo').hide();
                $.playground().registerCallback(function() {
                    if (i > 24) {
                          $('.touche').css('background-color', basic);
                    var random = Math.floor((Math.random() * 4));
                    $('.touche').eq(random).css('background-color', action);
                    $('#combo').fadeOut(levelrate / 2);
                    $('#win').fadeOut(levelrate / 5);

                    var iarandom = Math.floor((Math.random() * 5));

                    switch (iarandom) {
                        case 0:
                            $('#badguyfight').setAnimation(badguyup, 'callback');
                            iapoint = iapoint + 100;
                            break;
                        case 1:
                            $('#badguyfight').setAnimation(badguydown, 'callback');

                            iapoint = iapoint + 100;
                            break;
                        case 2:
                            $('#badguyfight').setAnimation(badguyleft, 'callback');
                            iapoint = iapoint + 100;
                            break;
                        case 3:
                            $('#badguyfight').setAnimation(badguyright, 'callback');
                            iapoint = iapoint + 100;
                            break;
                        case 4:
                            $('#badguyfight').setAnimation(badguyfail, 'callback');
                            iapoint = iapoint - 150;
                            break;
                        case 5:
                            $('#badguyfight').setAnimation(badguyfight, 'callback');
                            iapoint = iapoint + 50;
                            break;
                    }
                    }
                  
                    if (score >= scoremax) {
                        
                 soundwin.play();
                 combatsound.stop();
                soundmikeycreepy.play();
                        winfight = true;
                       $('#fight').children().remove();
                       $('#maingame').css('background-image','url("img/final.jpg")');
                       $('#fight').append('<div id="continue"></div>');
                       $('#continue').hide();
                       $('#continue').fadeIn(2000);
                      
                        levelrate = 0;
                        return levelrate;
                    }
                    if (iapoint >= scoremax) {
                        
                 soundenviro.play();
                 combatsound.stop();
                        texte = 'Vous avez perdu, soyez plus rapide, ou trouvez un objet qui vous permettrais de vous battre plus efficacement !!!';
                        score = 0;
                        combo = 0;
                        table = [0, 0];
                        idmap = '00';
                        state = "rpg";
                        mapgenerator('00');
                        $('#player').xy(450, 300, 0);
                        levelrate = 0;
                        return levelrate;
                    }
                    i=i+1
                }, levelrate);

            }

            $(function() {
                $("body").keypress(function(e) {
                });

                var kKeys = [];
                function Kpress(e) {
                    kKeys.push(e.keyCode);
                    if (kKeys.toString().indexOf("38,38,40,40,37,39,37,39,66,65") >= 0) {
                        jQuery(this).unbind('keydown', Kpress);
                        kExec();
                    }
                }
                jQuery(document).keydown(Kpress);

                function kExec() { //Un easter egg ? ICI ? !
                    fightgame('badguy', 700, 3000);
                }

            });

        });
    }
    ;

});
