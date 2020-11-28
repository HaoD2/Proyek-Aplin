var video = videojs('videoPlayer', {
    autoplay: 'muted',
    controls: true,
    loop: true,
    playbackRates: [0.25, 0.5, 1, 1.5, 2],
    plugins: {
        hotkeys: {
            enableModifiersForNumber: false
        },
        videoJsResolutionSwitcher: {
            default: 'high',
            dynamicLabel: true
        }
    }
}, function () {
    video.updateSrc([{
            src: 'Dota 2 2020.08.17 - 14.32.20.01_Trim.mp4',
            type: 'video/mp4',
            label: '360'
        },
        {
            src: 'Dota 2 2020.08.17 - 14.32.20.01_Trim.mp4',
            type: 'video/mp4',
            label: '720'
        }
    ])

    video.on('resolutionchange', function () {
        console.info('Source changed to %s', video.src())
    })

});