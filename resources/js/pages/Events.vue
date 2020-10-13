<template>
    <div>
        <div class="content">
            <div class="container-fluid">
                <div class="row"></div>
                <!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
                <div
                    class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20"
                >
                    <p class="_title0">
                        Trade Events

                        <v-dialog v-model="dialog" persistent max-width="600px">
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                    small
                                    class="ml-3"
                                    color="green darken-3"
                                    dark
                                    v-bind="attrs"
                                    v-on="on"
                                >
                                    <v-icon>mdi-map-marker-plus</v-icon>Add
                                    Event
                                </v-btn>
                            </template>
                            <v-card>
                                <v-card-title>
                                    <span class="headline"
                                        >Create New Event</span
                                    >
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12" sm="12" md="12">
                                                <v-text-field
                                                    outlined
                                                    label="Event Name *"
                                                    color="green darken-4"
                                                    hint="Event Name is Required"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" sm="12" md="6">
                                                <v-text-field
                                                    outlined
                                                    prepend-inner-icon="mdi-map-marker"
                                                    label="Venue *"
                                                    required
                                                    color="green darken-4"
                                                    hint="Events Location is required"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col cols="12" sm="12" md="6">
                                                <v-menu
                                                    ref="menu"
                                                    v-model="menu"
                                                    :close-on-content-click="
                                                        false
                                                    "
                                                    :return-value.sync="date"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="290px"
                                                >
                                                    <template
                                                        v-slot:activator="{
                                                            on,
                                                            attrs
                                                        }"
                                                    >
                                                        <v-text-field
                                                            v-model="date"
                                                            label="Picker in menu"
                                                            prepend-inner-icon="mdi-calendar"
                                                            readonly
                                                            outlined
                                                            v-bind="attrs"
                                                            v-on="on"
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker
                                                        v-model="date"
                                                        no-title
                                                        scrollable
                                                    >
                                                        <v-spacer></v-spacer>
                                                        <v-btn
                                                            text
                                                            color="primary"
                                                            @click="
                                                                menu = false
                                                            "
                                                        >
                                                            Cancel
                                                        </v-btn>
                                                        <v-btn
                                                            text
                                                            color="primary"
                                                            @click="
                                                                $refs.menu.save(
                                                                    date
                                                                )
                                                            "
                                                        >
                                                            OK
                                                        </v-btn>
                                                    </v-date-picker>
                                                </v-menu>
                                            </v-col>

                                            <v-col cols="12">
                                                <v-textarea
                                                    outlined
                                                    color="green darken-4"
                                                >
                                                    <template v-slot:label>
                                                        <div>
                                                            Events Discription
                                                            <small
                                                                >(optional)</small
                                                            >
                                                        </div>
                                                    </template>
                                                </v-textarea>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                    <small>*indicates required field</small>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        color="error darken-4"
                                        dark
                                        @click="dialog = false"
                                    >
                                        Close
                                    </v-btn>
                                    <v-btn
                                        color="green darken-4"
                                        dark
                                        @click="dialog = false"
                                    >
                                        Add Event
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </p>

                    <div class="_overflow _table_div">
                        <table class="_table">
                            <!-- TABLE TITLE -->
                            <tr>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            <!-- TABLE TITLE -->

                            <!-- ITEMS -->
                            <tr>
                                <td>25-05-19</td>
                                <td class="_table_name">
                                    Manhattan's art center "Shed" opening
                                    ceremony
                                </td>
                                <td>Economy</td>
                                <td>
                                    <button
                                        class="_btn _action_btn view_btn1"
                                        type="button"
                                    >
                                        View
                                    </button>
                                    <button
                                        class="_btn _action_btn edit_btn1"
                                        type="button"
                                    >
                                        Edit
                                    </button>
                                    <button
                                        class="_btn _action_btn make_btn2"
                                        type="button"
                                    >
                                        Make Features
                                    </button>
                                    <button
                                        class="_btn _action_btn make_btn3"
                                        type="button"
                                    >
                                        Make Card
                                    </button>
                                    <button
                                        class="_btn _action_btn make_btn1"
                                        type="button"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <!-- ITEMS -->

                            <!-- ITEMS -->
                            <tr>
                                <td>25-05-19</td>
                                <td class="_table_name">
                                    Are Trump era is having an impact on what 's
                                    future voters
                                </td>
                                <td>Social</td>
                                <td>
                                    <button
                                        class="_btn _action_btn view_btn1"
                                        type="button"
                                    >
                                        View
                                    </button>
                                    <button
                                        class="_btn _action_btn edit_btn1"
                                        type="button"
                                    >
                                        Edit
                                    </button>
                                    <button
                                        class="_btn _action_btn make_btn2"
                                        type="button"
                                    >
                                        Make Features
                                    </button>
                                    <button
                                        class="_btn _action_btn make_btn3"
                                        type="button"
                                    >
                                        Make Card
                                    </button>
                                    <button
                                        class="_btn _action_btn make_btn1"
                                        type="button"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <!-- ITEMS -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        dialog: false,
        date: new Date().toISOString().substr(0, 10),
        menu: false,
        modal: false
    }),
    computed: {}
};
</script>
