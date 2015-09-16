(function() {
    tinymce.create('tinymce.plugins.CAClickToTweet', {
        init: function(ed, url) {
            console.log( url );
            ed.addButton('ca-clicktotweet', {
                title: CAClickToTweet.button_title,
                image: CAClickToTweet.url + '/assets/img/twitter-little-bird-button.png',
                onclick: function() {
                    ed.windowManager.open({
                        title: 'Easy Click To Tweet Boxes',
                        body: [
                            {
                                type   : 'textbox',
                                name   : 'message',
                                label  : 'Tweet text',
                                minHeight: '50px'
                            }, {
                                type   : 'listbox',
                                name   : 'theme',
                                label  : 'Tweet Box Style',
                                values : [
                                    { text: 'Basic White Skin', value: 'basic-white', selected: true },
                                    { text: 'Basic Full Skin', value: 'basic-full' },
                                    { text: 'Basic Border', value: 'basic-border' }
                                ]
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

