const episode = {
    id: 0,
    name: "",
    slug: "",
    file_name: "",
    link_embed: "",
    link_m3u8: "",
    thumb: "",
    playerKey: "",
    setId(id) {
        this.id = id;
    },
    setName(name) {
        this.name = name
    },
    setSlug(slug) {
        this.slug = slug
    },
    setFileName(name) {
        this.file_name = name;
    },
    setEmbed(link) {
        this.link_embed = link
    },
    setM3U8(link) {
        this.link_m3u8 = link
    },
    setThumb(thumb) {
        this.thumb = thumb
    },
    setPlayerKey (key) {
        this.playerKey = key;
    }
}
$(document).ready(function () {
    const wrapper = document.getElementById('pembed');
    wrapper.innerHTML = `<div id="jwplayer"></div>`;
    const player = jwplayer("jwplayer");
    const objSetup = {
        key: "MBvrieqNdmVL4jV0x6LPJ0wKB/Nbz2Qq/lqm3g==",
        aspectratio: "16:9",
        width: "100%",
        height: "100%",
        image: episode.thumb,
        file: episode.link_m3u8,
        playbackRateControls: true,
        playbackRates: [0.25, 0.75, 1, 1.25],
        sharing: {
            sites: [
                "reddit",
                "facebook",
                "twitter",
                "googleplus",
                "email",
                "linkedin",
            ],
        },
        volume: 100,
        mute: false,
        autostart: true,
        logo: {
            file: "",
            link: "",
            position: "",
        },
        advertising: {
            tag: "",
            client: "vast",
            vpaidmode: "insecure",
            skipoffset: 5, // Bỏ qua quảng cáo trong vòng 5 giây
            skipmessage: "Bỏ qua sau xx giây",
            skiptext: "Bỏ qua"
        }
    };
    const segments_in_queue = 50;
    const engine_config = {
        debug: !1,
        segments: {
            forwardSegmentCount: 50,
        },
        loader: {
            cachedSegmentExpiration: 864e5,
            cachedSegmentsCount: 1e3,
            requiredSegmentsPriority: segments_in_queue,
            httpDownloadMaxPriority: 9,
            httpDownloadProbability: 0.06,
            httpDownloadProbabilityInterval: 1e3,
            httpDownloadProbabilitySkipIfNoPeers: !0,
            p2pDownloadMaxPriority: 50,
            httpFailedSegmentTimeout: 500,
            simultaneousP2PDownloads: 20,
            simultaneousHttpDownloads: 2,
            httpDownloadInitialTimeout: 0,
            httpDownloadInitialTimeoutPerSegment: 17e3,
            httpUseRanges: !0,
            maxBufferLength: 300
        },
    };
    if (Hls.isSupported() && p2pml.hlsjs.Engine.isSupported()) {
        const engine = new p2pml.hlsjs.Engine(engine_config);
        player.setup(objSetup);
        jwplayer_hls_provider.attach();
        p2pml.hlsjs.initJwPlayer(player, {
            liveSyncDurationCount: segments_in_queue, // To have at least 7 segments in queue
            maxBufferLength: 300,
            loader: engine.createLoaderClass(),
        });
    } else {
        player.setup(objSetup);
    }
}) ;
