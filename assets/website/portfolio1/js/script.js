$(document).ready(function () {
    /*--- fonction globales--*/

    $.fn.write = function (option) {

        // on prépare le plugin
        function caract(element, text, content) {

            // si le texte a une taille supp à 0, c'est qu'il reste encore des caractères
            if (text.length > 0) {

                var next = text.substr(0, 1); // on récupère le caractère

                // on enlève le caractère pour garder uniquement le reste
                text = text.substr(1);

                // on ajoute les caractères 1 par 1
                $(element).html(content + next);

                // on répète la fonction après le delai
                setTimeout(function () {
                    caract(element, text, content + next);
                }, option['delai']);
            }
        }

        // on configure l'élément par défaut
        option = option || {'delai': 50};
        // on exécute pour la 1er fois la fonction
        caract(this, $(this).html(), '');

    };
    $.fn.highlight = function (option) {

        // on prépare le plugin
        function lighting(element, max, i) {

            // si le texte a une taille supp à 0, c'est qu'il reste encore des caractères
            if (max + 3 > i) {
                // on ajoute les caractères 1 par 1
                $(element.eq(i)).css({'font-weight': 'bold'});
                i++;
                // on répète la fonction après le delai
                setTimeout(function () {
                    lighting(element, max, i);
                }, option['delai']);
            }
        }

        // on configure l'élément par défaut
        option = option || {'delai': 500};
        // on exécute pour la 1er fois la fonction
        lighting(this, $(this).index(), 0);

    };
    function user() {
        $.reject({
            reject: {
                msie: 9, // Microsoft Internet Explorer 9 ou moins
                opera: true,
                safari: false,
                chrome: false,
                firefox: false,
                konqueror: true, // Konqueror (Linux)  
                unknown: true // inconnu  
            },
            display: ['chrome', 'firefox'] // Displays only firefox, chrome
        });

        return false;
    }
    ;
    user();
    /*-----------------------------*/

    /*--------------------------*/
    /*----------MENU JS---------*/
    /*--------------------------*/
    $('#about').popup({
        content: $('#divabout')
    });
    $('#xp').popup({
        content: $('#divxp')
    });
    $('#soft').popup({
        content: $('#divsoft')
    });
    $('#graph').popup({
        content: $('#divgraph')
        
    });

//---hover menu----
    $('#about').hover(
            function () {//in
                $('#circlecenter').html("<p>A propos<br><span>de moi</span></p>");
            },
            function () {//out
                $('#circlecenter').html("<p>Portfolio<br><span>Martin Villanove</span></p>");
            });

    $('#xp').hover(
            function () {//in
                $('#circlecenter').html("<p>Mon parcours<br><span>Ecoles et <br> emplois</span></p>");
                $('#circlecenter p').css({
                    "padding-top": "18%",
                    "line-height": "0.8em"
                });
            },
            function () {//out
                $('#circlecenter').html("<p>Portfolio<br><span>Martin Villanove</span></p>");
            });

    $('#soft').hover(
            function () {//in
                $('#circlecenter').html("<p>Mes outils<br><span>Web | Vidéo | Multimédia</span></p>");
                $('#circlecenter p').css({
                    "padding-top": "10%",
                    "line-height": "0.8em"
                });
            },
            function () {//out
                $('#circlecenter').html("<p>Portfolio<br><span>Martin Villanove</span></p>");
            });

    $('#graph').hover(
            function () {//in
                $('#circlecenter').html("<p>Mes points forts<br></p>");
                $('#circlecenter p').css({
                    "padding-top": "20%",
                    "line-height": "0.8em"
                });
            },
            function () {//out
                $('#circlecenter').html("<p>Portfolio<br><span>Martin Villanove</span></p>");
            });

    /*-----------------------------*/
    /*------Sigma projects---------*/
    /*-----------------------------*/
    sigma.classes.graph.addMethod('neighbors', function (nodeId) {
        var k,
                neighbors = {},
                index = this.allNeighborsIndex[nodeId] || {};

        for (k in index)
            neighbors[k] = this.nodesIndex[k];

        return neighbors;
    });


    sigma.parsers.json('data/projectnode.json', {
        container: 'sigmacontainer',
        type: 'canvas',
        settings: {
            defaultNodeColor: '#4ec5ff',
            defaultLabelColor: 'grey',
            defaultEdgeHoverColor: 'black',
            defaultEdgeColor: 'grey',
            edgeColor: 'default',
            minNodeSize: 1,
            maxNodeSize: 50,
            font: 'Verdana',
            labelSize: 'proportional',
            labelSizeRatio: 0.6,
            labelColor: 'default',
            labelThreshold: 12,
            borderSize: 3,
            defaultNodeBorderColor: 'grey',
            hoverFontStyle: 'italic',
            scalingMode: 'outside',
            zoomMin: 0.2,
            zoomMax: 1.3,
            singleHover: true,
            edgeHoverColor: 'default',
            edgeHoverExtremities: true,
            edgeHoverSizeRatio: 1.5,
            edgeHoverPrecision: 10,
            sideMargin: 0.9,
            animationsTime: 300
        }

    }, function (s) {          // We first need to save the original colors of our
        // nodes and edges, like this:
        s.graph.nodes().forEach(function (n) {
            n.originalColor = n.color;
        });
        s.graph.edges().forEach(function (e) {
            e.originalColor = e.color;
        });

        s.bind('clickNode', function (e) {
            var nodeHref = e.data.node.href;
            var nodeId = e.data.node.id;
            if (nodeId == 'video' || nodeId == 'img' || nodeId == 'dev' || nodeId == 'other') {

                // When a node is clicked, we check for each node
                // if it is a neighbor of the clicked one. If not,
                // we set its color as grey, and else, it takes its
                // original color.
                // We do the same for the edges, and we only keep
                // edges that have both extremities colored.

                var nodeId = e.data.node.id,
                        toKeep = s.graph.neighbors(nodeId);
                toKeep[nodeId] = e.data.node;

                s.graph.nodes().forEach(function (n) {
                    if (toKeep[n.id])
                        n.color = '#ff884e';
                    else
                        n.color = n.originalColor;
                });

                s.graph.edges().forEach(function (e) {
                    if (toKeep[e.source] && toKeep[e.target])
                        e.color = 'black';
                    else
                        e.color = e.originalColor;
                });

                // Since the data has been modified, we need to
                // call the refresh method to make the colors
                // update effective.
                s.refresh();

            } else {
                if (nodeHref !== "") {
                    window.open(nodeHref);
                }
            }
        });
        setInterval(function () {
            var x = 0;
            var y = 0;
            s.graph.nodes().forEach(function (node) {
                x = node.x + ((Math.random() * 2 - 1) / 400);
                y = node.y + ((Math.random() * 2 - 1) / 400);
                node.x = x;
                node.y = y;
            });
            s.refresh();
        }, 150);

        // When the stage is clicked, we just color each
        // node and edge with its original color.
        s.bind('clickStage', function (e) {
            s.graph.nodes().forEach(function (n) {
                n.color = n.originalColor;
            });

            s.graph.edges().forEach(function (e) {
                e.color = e.originalColor;
            });

            // Same as in the previous event:
            s.refresh();
        });

    });
    /*-------------------------*/
    /*-------------------------*/
    /*-------------------------*/

    $(function () {
        $("body").keypress(function (e) {
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
            window.open("http://www.omfgdogs.com/");
        }

    });
});