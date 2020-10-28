<template>
    <v-row>
        <v-col class="" cols="12" sm="12" md="12">
            <h1 class="events">Departments Upcoming Events</h1>
        </v-col>
        <v-flex d-flex>
            <v-layout wrap>
                <v-flex
                    class="ma-5"
                    cols="12"
                    md="3"
                    sm="12"
                    v-for="(event, i) in events"
                    :key="i"
                >
                    <v-card class="mx-auto card-container" max-width="500">
                        <v-img
                            src="../images/main-slider/8.jpg"
                            height="200px"
                            class="white--text align-end"
                        >
                            <v-card-title class="event-name">{{
                                event.eventName
                            }}</v-card-title>
                        </v-img>
                        <v-card-title>
                            <span class="venue">Venue: </span>
                            <span class="event-venue mr-5">{{
                                event.venue
                            }}</span>
                        </v-card-title>

                        <v-card-text class="text--primary">
                            <div>
                                <span class="event-type">Date:</span>
                                <span class="type mr-5">{{
                                    event.date | myDate
                                }}</span>
                            </div>
                            <br />

                            <div>
                                <span class="event-type">Type of Event:</span>
                                <span class="type mr-5">{{
                                    event.eventType
                                }}</span>
                            </div>
                        </v-card-text>

                        <v-card-actions>
                            <h4 color="orange">
                                Events Description
                            </h4>

                            <v-spacer></v-spacer>

                            <v-btn @click="show = !show" text>
                                About Event
                                <v-icon>{{
                                    show ? "mdi-chevron-up" : "mdi-chevron-down"
                                }}</v-icon>
                            </v-btn>
                        </v-card-actions>

                        <v-expand-transition>
                            <div v-show="show">
                                <v-divider></v-divider>

                                <v-card-text class="description">
                                    {{ event.description }}
                                </v-card-text>
                            </div>
                        </v-expand-transition>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-flex>
    </v-row>
</template>

<script>
export default {
    data: () => ({
        show: false,
        events: []
    }),
    async created() {
        const res = await this.callApi("get", "api/events", {
            name: "eventName"
        });
        if (res.status == 200) {
            this.events = res.data;
        } else {
            Toast.fire({
                icon: "error",
                title: "Something went wrong"
            });
        }
    }
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;800&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap");
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap');
.event-type {
    /* font-weight: 600; */
    font-size: 19px;
    font-family: 'Nunito', sans-serif;
    font-weight: 800;
}

.type {
    font-size: 17px;
    font-family: 'Nunito', sans-serif;
    font-weight: 400;
}
.venue {
    font-family: 'Nunito', sans-serif;
    font-weight: 800;
}
.event-venue {
    font-family: "Tajawal", sans-serif;
}
.description{
    font-family: 'Nunito', sans-serif;
    font-weight: 400;
    font-size: 16px;
}

h1.events {
    /* margin-left: 2rem; */
    text-align: center;
    font-family: "Open Sans", sans-serif;
    font-weight: 800;
}

@media (max-width: 768px) {
    .event-card {
        /* align-content: center; */
        width: 100%;
        margin-right: auto !important;
        margin-left: auto !important;
        flex-flow: row wrap;
        justify-content: center;
        align-items: center;
    }
}

@media (min-width: 768px) {
    .event-card {
        /* align-content: center; */
        width: 100%;
        margin-right: auto !important;
        margin-left: auto !important;
        flex-flow: row wrap;
        justify-content: center;
        align-items: center;
    }
}

.event-name {
    font-weight: 800;
    font-family: "Open Sans";
}
</style>
