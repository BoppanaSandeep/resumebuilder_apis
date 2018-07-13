<div id="live-chat">

    <header class="clearfix">

        <a href="#" class="chat-close" id="close"><span aria-hidden="true">&times;</span></a>
        <a href="#" class="chat-close mr-1" id="minimize"><span aria-hidden="true">&minus;</span></a>

        <!-- <h4>John Doe</h4> -->

        <!-- Split dropup button -->
        <div class="btn-group m-0 p-0">
            <button type="button" class="btn btn-lg dropdown-toggle m-0 p-0" id="chat-name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <font>Sandeep</font>
            </button>
            <div class="dropdown-menu">
                <li class="dropdown-item">Sandeep</li>
                <li class="dropdown-item">Sandeep</li>
                <li class="dropdown-item">Sandeep</li>
                <li class="dropdown-item">Sandeep</li>
            </div>
        </div>

        <span class="chat-message-counter" style="display: block;">3</span>

    </header>

    <div class="chat" style="display: none;">

        <div class="chat-history">

            <div class="chat-message clearfix">

                <img src="<?php echo base_url(); ?>/assets/img/bg5.jpg" alt="" width="32" height="32">

                <div class="chat-message-content clearfix">

                    <span class="chat-time">13:35</span>

                    <h5>John Doe</h5>

                    <p>Lorem ipsum dolor sit amet.</p>

                </div>
                <!-- end chat-message-content -->

            </div>
            <!-- end chat-message -->

            <hr>

            <div class="chat-message clearfix">

                <img src="<?php echo base_url(); ?>/assets/img/bg5.jpg" alt="" width="32" height="32">

                <div class="chat-message-content clearfix">

                    <span class="chat-time">13:37</span>

                    <h5>Marco Biedermann</h5>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                </div>
                <!-- end chat-message-content -->

            </div>
            <!-- end chat-message -->

            <hr>

            <div class="chat-message clearfix">

                <img src="<?php echo base_url(); ?>/assets/img/bg5.jpg" alt="" width="32" height="32">

                <div class="chat-message-content clearfix">

                    <span class="chat-time">13:38</span>

                    <h5>John Doe</h5>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>

                </div>
                <!-- end chat-message-content -->

            </div>
            <!-- end chat-message -->

            <hr>

        </div>
        <!-- end chat-history -->

        <p class="chat-feedback">typing…</p>
        <fieldset>
            <div class="row">
                <div class="col-9 m-0 p-0">
                    <textarea type="text" class="w-100 h-100" placeholder="Write a message…" autofocus></textarea>
                </div>
                <div class="col-3 m-0 p-0">
                    <button type="button" class="btn btn-light bg-primary text-white w-75 h-100 m-0 p-0 float-right"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </div>
        </fieldset>
    </div>
    <!-- end chat -->

</div>
<!-- end live-chat -->

<div class="" id="open-chat">
	<i class="fa fa-comment-alt"></i>
</div>
