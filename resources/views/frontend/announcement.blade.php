<div id="block-bputm-content" data-block-plugin-id="system_main_block">
    <div class="content block-content">
        <article data-history-node-id="101"  about="/home">
    <div>
    <div class="layout layout--onecol">
        <div  class="layout__region layout__region--content">
            <div data-block-plugin-id="views_block:home_page-hpg_announcements">
                <div class="content block-content">
                    <div class="views-element-container">
                        <div class="view view-home-page view-id-home_page view-display-id-hpg_announcements js-view-dom-id-ab2320084bbd7ae52cb246f519c0b50acdcc9df19d02c82137050ab56bfa12c8">
                            <div class="view-content">
                                <!-- Announcements Section Start -->
                                <div class="announcements"> 
                                    <div class="container">
                                        <p class="announcements__text">Announcements</p>
                                        <div class="marquee__movecotent">
                                            <div id="marqueeContent" class="marquee__content clearfix">
                                                @foreach($announcements as $key => $announcementObject)
                                                <div class="announcements__list">
                                                    <a href="# "  target="_blank" >{{$announcementObject->announcements_title}}</a>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                <div>
                                <h1 class="sr-only">No. 1 for 5 Years Running...</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>