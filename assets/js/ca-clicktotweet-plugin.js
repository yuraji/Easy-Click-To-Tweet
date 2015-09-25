(function() {
    tinymce.create('tinymce.plugins.CAClickToTweet', {
        init: function(ed, url) {
            console.log( url );

            jQuery('<link rel="stylesheet" src="../wp-content/plugins/Easy-Click-To-Tweet/assets/css/ca_click_to_tweet.css"></link>').appendTo('head');

            var maxLength = 30; // maximum allowed characters

            var $input; // tweet input
            var $preview = jQuery('<div id="CAClickToTweetPreview" class="basic-white" />'); // preview container
            var $counter = jQuery('<div id="CAClickToTweetCounter"/>'); // counter element
            var $body; // popup body
            var len; // length of the tweet
            var danger; // maximum allowed characters exceeded

            // temporary add style
            $preview.add($counter).css({
                position: 'absolute', bottom: 0, border: '5px solid yellow', padding: '5px'
            });
            $counter.css({ right: 0 });

            /**
             * Update the preview text
             */
            var updatePreview = function(){
                var text = jQuery.trim( $input.val() );
                if( !text ){
                    text = "&nbsp;";
                }
                $preview.html( text );
            };

            /**
             * Update the counter element with the number of entered tweet characters
             */
            var updateCounter = function(){
                var num = $input.val().length;
                $counter.html( num );
                danger = (num>maxLength);
                danger? $body.addClass('danger') : $body.removeClass('danger');
            };

            ed.addButton('ca-clicktotweet', {
                title: CAClickToTweet.button_title,
                image: CAClickToTweet.url + '/assets/img/twitter-little-bird-button.png',
                onclick: function() {

                    /**
                     * Setup element references after popup is opened.
                     */
                    var initPreview = function(e){
                        initPreview = function(){}; /* make this function only runs once after popup is opened */
                        $input = jQuery(e.target);
                        $body = $input.closest('.mce-window-body');
                        $body.append( $preview, $counter );
                    };

                    ed.windowManager.open({
                        title: 'Easy Click To Tweet Boxes',
                        width: 700,
                        minHeight: 300,
                        body: [
                            {
                                type   : 'textbox',
                                name   : 'message',
                                label  : 'Tweet text',
                                minHeight: '50px',
                                onkeyup: function(e){
                                    initPreview(e);
                                    updatePreview();
                                    updateCounter();
                                }
                            }, {
                                type   : 'listbox',
                                name   : 'theme',
                                label  : 'Tweet Box Style',
                                values : [
                                    { text: 'Basic White Skin', value: 'basic-white', selected: true },
                                    { text: 'Basic Full Skin', value: 'basic-full' },
                                    { text: 'Basic Border', value: 'basic-border' }
                                ],
                                onselect: function(e){
                                    $preview.removeClass().addClass( this.value() );
                                }
                            }
                        ],
                        onsubmit: function(e) {
                            var tweet = '[Tweet';
                            //Change paramater here for an new listbox, ie copy and past & change theme 
                            if ( e.data.theme ) {
                                tweet += ' theme="' + e.data.theme + '"';
                            };

                            tweet += ']' + e.data.message + '[/Tweet]';
                            ed.focus();
                            console.log( e.data );
                            ed.selection.setContent( tweet );
                        }
                    });
                    // var m = prompt("Click To Tweet", "Enter your tweets");
                    // if (m != null && m != 'undefined' && m != 'Enter your tweets' && m != '') ed.execCommand('mceInsertContent', false, '[Tweet]' + m + '[/Tweet]');
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        },
        getInfo: function() {
            return {
                longname: "Easy Click To Tweet",
                author: 'CheekyApps',
                authorurl: 'http://CheeyApps.com/',
                infourl: 'http://CheekyApps.com/click-to-tweet-plugin',
                version: "1.0"
            };
        }
    });
//


    tinymce.PluginManager.add('caclicktotweet', tinymce.plugins.CAClickToTweet);
})();

