<div id="navBar">
    <div id="menuProfileContainer">
        <div id="openmenu">
            <div id="openMenuIcon" class="fa fa-cube"></div>
            <div id="openMenuWord">menu</div>
        </div>
        <div id="navBarProfile">{{Auth::user()->name}}'s profile<img src="{{Auth::user()->avatar}}" alt="" id="navBarProfilePic"></div>
    </div>
    <div id="messageNotifLogoutContainer">
        <div id="messageButtonContainer">
            <div id="messageButtonContainerIcon" class="fa fa-envelope"></div>
            <p id="messageButtonContainerWord">messages</p>
        </div>
        <div id="notificationsButtonContainer">
            <div id="notificationsButtonContainerIcon" class="fa fa-bell"></div>
            <p id="notificationsButtonContainerWord">notifications</p>
        </div>
        <div id="nightButtonContainer">
            <div id="nightButtonContainerIcon" class="fa fa-adjust"></div>
            <p id="nightButtonContainerWord">night mode</p>
        </div>
        <div id="logoutButtonContainer">
            <div id="logoutButtonContainerIcon" class="fa fa-power-off"></div>
            <p id="logoutButtonContainerWord">sign off</p>
        </div>
    </div>
</div>