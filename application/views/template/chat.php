

<div id="main-chat-wrapper" >

    <div class="chat-window-wrapper fadeIn" id="chat-users" >
        <div class="chat-header">
            <div class="pull-left">
                <input type="text" placeholder="search">
            </div>
            <div class="pull-right"> <a href="#" class="" >
                    <div class="iconset top-settings-dark "></div>
                </a> </div>
        </div>
        <div class="side-widget">
            <div class="side-widget-title">group chats</div>
            <div class="side-widget-content">
                <div id="groups-list">
                    <ul class="groups" >
                        <li><a href="#">
                                <div class="status-icon green"></div>
                                Office work</a></li>
                        <li><a href="#">
                                <div class="status-icon green"></div>
                                Personal vibes</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="side-widget fadeIn">
            <div class="side-widget-title">Office Chat</div>
            <div id="favourites-list">
                <div class="side-widget-content" >
                    <div class="user-details-wrapper active" data-chat-status="online" data-chat-user-pic="<?php echo base_url(); ?>application_resources/img/profiles/d.jpg" data-chat-user-pic-retina="<?php echo base_url(); ?>application_resources/img/profiles/d2x.jpg" data-user-name="Jane Smith">
                        <?php
                        $employee_service = new Employee_service();
                        $employees = $employee_service->get_employees_by_company_id($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
                        foreach ($employees as $employee) {
                            if ($employee->employee_code != $this->session->userdata('EMPLOYEE_CODE')) {
                                ?>
                                <div class="user-details">

                                    <div class="user-name"> <?php echo $employee->employee_fname ?></div>
                                    <div class="user-more"> Hello you there? </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <div class="user-details-count-wrapper">
                            <div class="status-icon green"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="chat-window-wrapper fadeIn" id="messages-wrapper" style="display:none">
        <div class="chat-header">
            <div class="pull-left">
                <input type="text" placeholder="search">
            </div>
            <div class="pull-right"> <a href="#" class="" >
                    <div class="iconset top-settings-dark "></div>
                </a> </div>
        </div>
        <div class="clearfix"></div>






        <div class="chat-messages-header">
            <div class="status online"></div>

            <div class="chat-messages" id="chat-area">

            </div>
        </div>




        <form id="send-message-area">
            <div class="chat-input-wrapper" style="display:none">
                <textarea id="sendie" maxlength = '100' ></textarea>
            </div>
        </form>
        <div class="clearfix"></div>
    </div>