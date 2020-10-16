<template>
    <nav>
        <v-navigation-drawer
            v-model="primaryDrawer.model"
            :clipped="primaryDrawer.clipped"
            app
            dark
            color="green darken-4"
            overflow
        >
            <v-list-item class="px-2 mt-4">
                <span>
                    <v-list-item-avatar size="50">
                        <v-img
                            src="../images/nigerialogo.png"
                            style="border: thin solid #fff"
                            width="100px"
                        ></v-img>
                        <!-- <img
                            src="../images/nigerialogo.png"
                            style="border: thin solid #fff"
                            alt=""
                        /> -->
                    </v-list-item-avatar>
                </span>
                <span>
                    <v-list-item-content>
                        <v-list-item-title class="title"
                            >Admin</v-list-item-title
                        >
                        <v-list-item-subtitle
                            >admin@me.com</v-list-item-subtitle
                        >
                    </v-list-item-content>
                </span>
            </v-list-item>

            <!-- <v-list-item link>

      </v-list-item>-->

            <v-divider></v-divider>
            <v-list dense nav class="mt-4">
                <v-list-item
                    v-for="item in items"
                    :key="item.title"
                    router
                    :to="item.route"
                >
                    <v-list-item-icon>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-icon>

                    <v-list-item-content>
                        <v-list-item-title>{{ item.title }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar :clipped-left="primaryDrawer.clipped" app flat class="nav">
            <v-toolbar flat>
                <v-app-bar-nav-icon
                    v-if="primaryDrawer.type !== 'permanent'"
                    @click.stop="primaryDrawer.model = !primaryDrawer.model"
                ></v-app-bar-nav-icon>
                <v-toolbar-title>Bilateral Trade Department</v-toolbar-title>
                <v-spacer></v-spacer>
                <!-- <v-col cols="3" sm="2">
                    <v-text-field
                        class="mt-5"
                        label="Search"
                        append-icon="mdi-magnify"
                    ></v-text-field>
        </v-col>-->

                <v-btn icon>
                    <v-icon>mdi-bell</v-icon>
                </v-btn>

                <span>
                    <v-btn icon>
                        <v-icon>mdi-account</v-icon>
                    </v-btn>
                </span>
                <span>Admin</span>
            </v-toolbar>
        </v-app-bar>
    </nav>
</template>

<script>
export default {
    data: () => ({
        isLoggedIn: false,
        drawers: ["Default (no property)"],
        items: [
            {
                title: "Dashboard",
                icon: "mdi-view-dashboard",
                route: "/home"
            },
            {
                title: "Events",
                icon: "mdi-calendar-multiple",
                route: "/tradeevents"
            },
            {
                title: "Documents",
                icon: "mdi-text-box-plus",
                route: "/documents"
            },
            { title: "Users", icon: "mdi-account-group", route: "/users" },
            { title: "Logout", icon: "mdi-logout", route: "/logout" }
        ],
        primaryDrawer: {
            model: null,
            type: "default (no property)",
            clipped: false,
            floating: false,
            mini: false
        },
        methods: {},
        footer: {
            inset: true
        }
    })
};
</script>

<style>
.nav {
    background: #fff !important;
}
</style>
