(function ($) {

	//Functions
	cwTracked = {

		audio: function () {

			//Lets setup the audio player stuff
			var a = audiojs.createAll({
				createPlayer: {
					markup: '\
						<div class="play-pause"> \
						<p class="play"><i class="icon-playa"></i></p> \
						<p class="pause"><i class="icon-pausea"></i></p> \
						<p class="loading"></p> \
						<p class="error"></p> \
						</div> \
						<div class="scrubber"> \
						<div class="progress"></div> \
						<div class="loaded"></div> \
						</div> \
						<div class="time"> \
						<em class="played">00:00</em>/<strong class="duration">00:00</strong> \
						</div> \
						<div class="error-message"></div>',
					playPauseClass: 'play-pause',
					scrubberClass: 'scrubber',
					progressClass: 'progress',
					loaderClass: 'loaded',
					timeClass: 'time',
					durationClass: 'duration',
					playedClass: 'played',
					errorMessageClass: 'error-message',
					playingClass: 'playing',
					loadingClass: 'loading',
					errorClass: 'error'
				},
				css: false,
				imageLocation: false,

			});

			$(a).each(function (key, value) {

				var as = a[key],
					audio_player = $('.audiojs').get(key)
					play_btn = $(audio_player).find('.play-pause'),
					cw_list = $(audio_player).next(),
					cw_list_li = $(cw_list).find('li'),

					first = $(cw_list).find('li a').attr('data-src');

				$(cw_list_li).first().addClass('playing');

				as.load(first);

				//Make sure everything paues     
				$(cw_list_li).click(function (e) {
					e.preventDefault();
					$(this).addClass('playing').siblings().removeClass('playing');
					var thisIndex = $(audio_player).index('.audiojs');

					$.each(a, function (index, val) {
						if (index != thisIndex && a[index].playing) a[index].pause();
					});

					as.load($('a', this).attr('data-src'));
					as.play();
				});

				//Make sure everything paues again
				$(play_btn).click(function () {
					var thisIndex = $(this).parents('.audiojs').index('.audiojs');

					$.each(a, function (index, val) {
						if (index != thisIndex && a[index].playing) a[index].pause();
					});

				});

				//trackEnded needs new var so it doesnt loop multiple players
				as.trackEnded = function () {

					var thisIndex = $(audio_player).index('.audiojs');
					current = $('.audiojs').get(thisIndex), audio_list = $(current).next(), playing = $(audio_list).find('li.playing');
					next = $(playing).next();

					if (!next.length) next = $(audio_list).children().first();
					next.addClass('playing').siblings().removeClass('playing');
					as.load($('a', next).attr('data-src'));
					as.play();
				}

			});

		}
	} //End Functions

		cwTracked.audio();
	
})(jQuery);