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
                  @click.prevent="addEventDialog"
                >
                  <v-icon>mdi-map-marker-plus</v-icon>Add Event
                </v-btn>
              </template>
              <v-card>
                <v-card-title>
                  <span class="headline">Create New Event</span>
                </v-card-title>
                <v-card-text>
                  <v-container>
                    <v-row>
                      <v-col cols="12" sm="12" md="12" v-show="!editmode">
                        <v-text-field
                          v-model="data.eventName"
                          outlined
                          label="Event Name *"
                          color="green darken-4"
                          hint="Event Name is Required"
                          required
                        ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="12" md="6" v-show="!editmode">
                        <v-text-field
                          v-model="data.venue"
                          outlined
                          prepend-inner-icon="mdi-map-marker"
                          label="Venue *"
                          required
                          color="green darken-4"
                          hint="Events Location is required"
                        ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="12" md="6" v-show="!editmode">
                        <v-menu
                          ref="menu"
                          v-model="menu"
                          :close-on-content-click="false"
                          :return-value.sync="data.date"
                          transition="scale-transition"
                          offset-y
                          min-width="290px"
                        >
                          <template
                            v-slot:activator="{
                              on,
                              attrs,
                            }"
                          >
                            <v-text-field
                              v-model="data.date"
                              label="Picker in menu"
                              prepend-inner-icon="mdi-calendar"
                              readonly
                              outlined
                              v-bind="attrs"
                              v-on="on"
                            ></v-text-field>
                          </template>
                          <v-date-picker
                            v-model="data.date"
                            no-title
                            scrollable
                          >
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="menu = false">
                              Cancel
                            </v-btn>
                            <v-btn
                              text
                              color="primary"
                              @click="$refs.menu.save(data.date)"
                            >
                              OK
                            </v-btn>
                          </v-date-picker>
                        </v-menu>
                      </v-col>

                      <v-col cols="12" sm="12" md="12" v-show="!editmode">
                        <v-autocomplete
                          :items="[
                            'Meeting',
                            'Training',
                            'Conference',
                            'Workshop',
                          ]"
                          v-model="data.eventType"
                          outlined
                          chips
                          label="Select Event Type"
                          data-vv-name="select"
                        ></v-autocomplete>
                      </v-col>

                      <v-col cols="12" v-show="!editmode">
                        <v-textarea
                          v-model="data.description"
                          outlined
                          color="green darken-4"
                        >
                          <template v-slot:label>
                            <div>
                              Events Discription
                              <small>(optional)</small>
                            </div>
                          </template>
                        </v-textarea>
                      </v-col>
                      <v-col v-show="!editmode" cols="12" sm="12" md="12">
                        <Upload
                          multiple
                          ref="uploads"
                          :headers="{
                            'x-csrf-token': token,
                            'X-Requested-With': 'XMLHttpRequest',
                          }"
                          :on-success="handleSuccess"
                          :on-error="handleError"
                          :format="['pdf']"
                          :max-size="6144"
                          :on-format-error="handleFormatError"
                          :on-exceeded-size="handleMaxSize"
                          type="drag"
                          action="api/upload_program"
                        >
                          <div style="padding: 20px 0">
                            <Icon
                              type="ios-cloud-upload"
                              size="52"
                              style="color #3399ff"
                            ></Icon>
                            <p>Click or drag here to upload events program</p>
                          </div>
                        </Upload>

                        <div
                          class="demo-upload-list"
                          v-if="data.eventProgram"
                        >
                          <img :src="`${data.eventProgram}`" />
                          <div
                            class="demo-upload-list-cover"
                            v-show="!editmode"
                          >
                            <Icon
                              type="ios-trash-outline"
                              @click.prevent="deleteFile()"
                            ></Icon>
                          </div>
                        </div>
                      </v-col>



                      <v-col cols="12" sm="12" md="12" v-show="editmode">
                        <v-text-field
                          v-model="editData.eventName"
                          outlined
                          label="Event Name *"
                          color="green darken-4"
                          hint="Event Name is Required"
                          required
                        ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="12" md="6" v-show="editmode">
                        <v-text-field
                          v-model="editData.venue"
                          outlined
                          prepend-inner-icon="mdi-map-marker"
                          label="Venue *"
                          required
                          color="green darken-4"
                          hint="Events Location is required"
                        ></v-text-field>
                      </v-col>

                      <v-col cols="12" sm="12" md="6" v-show="editmode">
                        <v-menu
                          ref="menu1"
                          v-model="menu1"
                          :close-on-content-click="false"
                          :return-value.sync="editData.date"
                          transition="scale-transition"
                          offset-y
                          min-width="290px"
                        >
                          <template
                            v-slot:activator="{
                              on,
                              attrs,
                            }"
                          >
                            <v-text-field
                              v-model="editData.date"
                              label="Picker in menu"
                              prepend-inner-icon="mdi-calendar"
                              readonly
                              outlined
                              v-bind="attrs"
                              v-on="on"
                            ></v-text-field>
                          </template>
                          <v-date-picker
                            v-model="editData.date"
                            no-title
                            scrollable
                          >
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="menu1 = false">
                              Cancel
                            </v-btn>
                            <v-btn
                              text
                              color="primary"
                              @click="$refs.menu1.save(editData.date)"
                            >
                              OK
                            </v-btn>
                          </v-date-picker>
                        </v-menu>
                      </v-col>

                      <v-col cols="12" sm="12" md="12" v-show="editmode">
                        <v-autocomplete
                          :items="[
                            'Meeting',
                            'Training',
                            'Conference',
                            'Workshop',
                          ]"
                          v-model="editData.eventType"
                          outlined
                          chips
                          label="Select Event Type"
                          data-vv-name="select"
                        ></v-autocomplete>
                      </v-col>

                      <v-col cols="12" v-show="editmode">
                        <v-textarea
                          v-model="editData.description"
                          outlined
                          color="green darken-4"
                        >
                          <template v-slot:label>
                            <div>
                              Events Discription
                              <small>(optional)</small>
                            </div>
                          </template>
                        </v-textarea>
                      </v-col>
                      <v-col v-show="editmode" cols="12" sm="12" md="12">
                        <Upload v-show="isDocumentNew"
                          multiple
                          ref="editDataUploads"
                          :headers="{
                            'x-csrf-token': token,
                            'X-Requested-With': 'XMLHttpRequest',
                          }"
                          :on-success="handleSuccess"
                          :on-error="handleError"
                          :format="['pdf']"
                          :max-size="6144"
                          :on-format-error="handleFormatError"
                          :on-exceeded-size="handleMaxSize"
                          type="drag"
                          action="api/upload_program"
                        >
                          <div style="padding: 20px 0">
                            <Icon
                              type="ios-cloud-upload"
                              size="52"
                              style="color #3399ff"
                            ></Icon>
                            <p>Click or drag here to upload events program</p>
                          </div>
                        </Upload>

                        <div
                          class="demo-upload-list"
                          v-if="editData.eventProgram"
                        >
                          <img :src="`${editData.eventProgram}`" />
                          <div
                            class="demo-upload-list-cover"
                            v-show="editmode"
                          >
                            <Icon
                              type="ios-trash-outline"
                              @click.prevent="deleteFile(false)"
                            ></Icon>
                          </div>
                        </div>
                      </v-col>
                    </v-row>
                  </v-container>
                  <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="error darken-4" dark @click="closeEditDialog">
                    Close
                  </v-btn>
                  <v-btn
                    color="success darken-4"
                    @click.prevent="
                      editmode ? updateEvent() : addEvent();
                      loader = 'isAdding';
                    "
                    :loading="isAdding"
                    :disabled="isAdding"
                    v-show="!editmode"
                  >
                    Add Event
                    <template v-slot:loader>
                      <span class="custom-loader">
                        <v-icon light>mdi-cached</v-icon>
                      </span>
                    </template>
                  </v-btn>
                  <v-btn
                    color="success darken-4"
                    @click.prevent="
                      editmode ? updateEvent() : addEvent();
                      loader = 'isAdding';
                    "
                    :loading="isAdding"
                    :disabled="isAdding"
                    v-show="editmode"
                  >
                    Edit Event
                    <template v-slot:loader>
                      <span class="custom-loader">
                        <v-icon light>mdi-cached</v-icon>
                      </span>
                    </template>
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-dialog>
          </p>

          <div class="_overflow _table_div">
            <table class="_table">
              <!-- TABLE TITLE -->
              <tr>
                <th>ID</th>
                <th>Event Name</th>
                <th>Venue</th>
                <th>Date</th>
                <th>Event Type</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
              <!-- TABLE TITLE -->

              <!-- ITEMS -->
              <tr v-for="(event, i) in events" :key="i">
                <td>{{ event.id }}</td>
                <td class="_table_name">
                  {{ event.eventName | upText }}
                </td>
                <td>{{ event.venue }}</td>
                <td>{{ event.date | myDate }}</td>
                <td>{{ event.eventType }}</td>
                <td>{{ event.description }}</td>
                <td>
                  <v-btn
                    small
                    color="primary darken-4"
                    class="ma-1 flat"
                    @click="editEventDialog(event, i)"
                    >Edit</v-btn
                  >
                  <v-btn
                    small
                    color="error darken-4"
                    class="ma-1 flat"
                    @click="deleteEvent(event, i)"
                    >Delete</v-btn
                  >
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
  watch: {
    loader() {
      const l = this.loader;
      this[l] = !this[l];

      setTimeout(() => (this[l] = false), 4000);

      this.loader = null;
    }
  },
  data: () => ({
    dialog: false,
    editmode: false,
    menu: false,
    menu1: false,
    modal: false,
    data: {
      eventName: "",
      venue: "",
      eventType: "",
      description: "",
      date: new Date().toISOString().substr(0, 10),
      eventProgram: ""
    },
    editData: {
      eventName: "",
      venue: "",
      eventType: "",
      description: "",
      date: new Date().toISOString().substr(0, 10),
      eventProgram: ""
    },
    events: [],
    index: -1,
    i: -1,
    isAdding: false,
    isDeleting: false,
    loader: null,
    token: '',
    isDocumentNew: false,
    isEditingEvent: false,
  }),
  methods: {
    handleSuccess(res, file) {
      console.log(`/uploads/${res}`);
      res = `/uploads/${res}`;
      if (this.isEditingEvent) {
          return (this.editData.eventProgram = res);
      }
      this.data.eventProgram = res;
    },
    handleError(res, file) {
      Swal.fire(
        "The File format is incorrect.",
        `${file.errors.file.length
          ? file.errors.file[0]
          : "Something went wrong"
        }`,
        "error"
      );
    },
    handleFormatError(file) {
      Swal.fire(
        "The File format is incorrect.",
        "File format of " +
        file.name +
        " is incorrect. Please select PDF file.",
        "error"
      );
    },
    handleMaxSize(file) {
      Swal.fire(
        "Exceeding File Size Limit",
        "File format of " +
        file.name +
        " is too large, no more than 6MB.",
        "error"
      );
    },
    addEventDialog() {
      this.dialog = true;
      this.data.eventName = "";
      this.editmode = false;
    },
    editEventDialog(event, index) {
      this.editmode = true;
      this.data.name = "";
      this.dialog = true;
      this.editData = event;
      this.editData = Object.assign({}, event);
      this.index = index;
      this.isEditingEvent = true;
    },
    closeEditDialog() {
        this.isEditingEvent = false;
        this.dialog = false;
    },
    async addEvent() {
      console.log("Adding...");
      this.data.eventProgram = `/uploads/${this.data.eventProgram}`;
      const res = await this.callApi("post", "api/events", this.data);
      if (res.status === 201) {
        this.events.unshift(res.data);
        Toast.fire({
          icon: "success",
          title: "Event Created Successfully"
        });
        this.dialog = false;
        this.data.eventName = "";
        this.data.venue = "";
        this.data.eventType = "";
        this.data.date = "";
        this.data.description = "";
        this.data.eventProgram = "";
      } else {
        if ((res.status = 422)) {
          console.log(res.data.errors);
          for (let i in res.data.errors) {
            // Toast.fire({
            //     icon: "info",
            //     title: res.data.errors[i][0]
            // });
            this.e(res.data.errors[i][0]);
          }
        } else {
          Toast.fire({
            icon: "error",
            title: "Something went wrong"
          });
        }
      }
    },
    async updateEvent() {
      console.log("Editing");
      const res = await this.callApi(
        "post",
        "api/update_event",
        this.editData
      );
      if (res.status === 200) {
        this.events[this.index] = this.editData;
        Toast.fire({
          icon: "success",
          title: "Event Updated Successfully"
        });
        this.dialog = false;
      } else {
        if (res.status == 422) {
          console.log(res.data.errors);
          for (let i in res.data.errors) {
            // Toast.fire({
            //     icon: "error",
            //     title: res.data.errors[i][0]
            // });
            this.e(res.data.errors[i][0]);
          }
        } else {
          Toast.fire({
            icon: "error",
            title: "Something Went wrong"
          });
        }
      }
    },

    async deleteFile(isAdd = true) {
      let eventProgram;
      if (!isAdd) {
        //   For Editing
        this.isDocumentNew = true;
        eventProgram = this.editData.eventProgram;
        this.editData.eventProgram = "";
        this.$refs.editDataUploads.clearFiles();
        console.log(this.editData.eventProgram);
      } else {
        eventProgram = this.data.eventProgram;
        this.data.eventProgram = "";
        this.$refs.uploads.clearFiles();
      }
      const res = await this.callApi("post", "api/delete_program", {
        imageName: eventProgram
      });
      if (res.status !== 200) {
        this.data.eventProgram = eventProgram;
        Toast.fire({
          icon: error,
          title: "Something went wrong"
        });
      }
      console.log(this.data.eventProgram);
    },

    async deleteEvent(event, i) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.value) {
          this.callApi("post", "api/delete_event", event).then(() => {
            Swal.fire(
              "Deleted!",
              "Event has been deleted Successfully.",
              "success"
            ),
              this.events.splice(i, 1);
          });
        }
      });
    }
  },
  computed: {},
  async created() {
      this.token = window.Laravel.csrfToken;
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
<style>
.custom-loader {
  animation: loader 1s infinite;
  display: flex;
}
@-moz-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@-o-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
</style>
