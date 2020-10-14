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
                        Users

                        <v-dialog v-model="dialog" persistent max-width="600px">
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                    small
                                    class="ml-3"
                                    color="green darken-3"
                                    dark
                                    @click="addUserDialog"
                                    v-bind="attrs"
                                    v-on="on"
                                >
                                    <v-icon>mdi-account-plus</v-icon>Add Users
                                </v-btn>
                            </template>
                            <v-card>
                                <v-card-title>
                                    <span v-show="!editmode" class="headline"
                                        >Create New User</span
                                    >
                                    <span v-show="editmode" class="headline"
                                        >Edit User</span
                                    >
                                </v-card-title>
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="!editmode"
                                            >
                                                <v-text-field
                                                    v-model="data.name"
                                                    outlined
                                                    label="First Name *"
                                                    color="green darken-4"
                                                    hint="User Name is Required"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="!editmode"
                                            >
                                                <v-text-field
                                                    v-model="data.lastName"
                                                    outlined
                                                    label="Last Name *"
                                                    color="green darken-4"
                                                    hint="User Name is Required"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="12"
                                                v-show="!editmode"
                                            >
                                                <v-text-field
                                                    v-model="data.email"
                                                    outlined
                                                    prepend-inner-icon="mdi-at"
                                                    label="Email *"
                                                    required
                                                    color="green darken-4"
                                                    hint="Email field is required"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="12"
                                                v-show="!editmode"
                                            >
                                                <v-text-field
                                                    v-model="data.password"
                                                    outlined
                                                    prepend-inner-icon="mdi-lock"
                                                    label="Password *"
                                                    required
                                                    color="green darken-4"
                                                    hint="Password field is required"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="editmode"
                                            >
                                                <v-text-field
                                                    v-model="editData.name"
                                                    outlined
                                                    label="First Name *"
                                                    color="green darken-4"
                                                    hint="User Name is Required"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="6"
                                                v-show="editmode"
                                            >
                                                <v-text-field
                                                    v-model="editData.lastName"
                                                    outlined
                                                    label="Last Name *"
                                                    color="green darken-4"
                                                    hint="User Name is Required"
                                                    required
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="12"
                                                v-show="editmode"
                                            >
                                                <v-text-field
                                                    v-model="editData.email"
                                                    outlined
                                                    prepend-inner-icon="mdi-at"
                                                    label="Email *"
                                                    required
                                                    color="green darken-4"
                                                    hint="Email field is required"
                                                ></v-text-field>
                                            </v-col>

                                            <v-col
                                                cols="12"
                                                sm="12"
                                                md="12"
                                                v-show="editmode"
                                            >
                                                <v-text-field
                                                    v-model="editData.password"
                                                    outlined
                                                    prepend-inner-icon="mdi-lock"
                                                    label="Password *"
                                                    required
                                                    color="green darken-4"
                                                    hint="Password field is required"
                                                ></v-text-field>
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
                                        @click="
                                            editmode ? updateUser() : addUser()
                                        "
                                        v-show="!editmode"
                                    >
                                        Add User
                                    </v-btn>
                                    <v-btn
                                        color="green darken-4"
                                        dark
                                        @click="
                                            editmode ? updateUser() : addUser()
                                        "
                                        v-show="editmode"
                                    >
                                        Edit User
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
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            <!-- TABLE TITLE -->

                            <!-- ITEMS -->
                            <tr v-for="(user, i) in users" :key="i">
                                <td>{{ user.id }}</td>
                                <td class="_table_name">
                                    {{ user.name }}
                                </td>
                                <td>{{ user.lastName | upText }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.created_at | myDate }}</td>
                                <td>
                                    <v-btn
                                        small
                                        color="primary darken-4"
                                        class="ma-1 flat"
                                        @click="editUserDialog(user, i)"
                                        >Edit</v-btn
                                    >
                                    <v-btn
                                        small
                                        color="error darken-4"
                                        class="ma-1 flat"
                                        @click="deleteUser(user, i)"
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
    data: () => ({
        dialog: false,
        editmode: false,
        menu: false,
        modal: false,
        data: {
            name: "",
            lastName: "",
            email: "",
            password: ""
        },
        editData: {
            name: "",
            lastName: "",
            email: "",
            password: ""
        },
        users: [],
        index: -1,
        i: -1
    }),
    methods: {
        addUserDialog() {
            this.editmode = false;
            this.data.name = "";
            this.dialog = true;
        },
        editUserDialog(user, index) {
            this.editmode = true;
            this.data.name = "";
            this.dialog = true;
            this.editData = user;
            this.editData = Object.assign({}, user);
            this.index = index;
        },
        async addUser() {
            console.log("Adding...");
            const res = await this.callApi(
                "post",
                "api/create_users",
                this.data
            );
            if (res.status === 201) {
                this.users.unshift(res.data);
                Toast.fire({
                    icon: "success",
                    title: "User Created Successfully"
                });
                this.dialog = false;
                this.data.name = "";
                this.data.lastName = "";
                this.data.email = "";
                this.data.password = "";
            } else {
                if ((res.status = 422)) {
                    console.log(res.data.errors);
                    for (let i in res.data.errors) {
                        Toast.fire({
                            icon: "info",
                            title: res.data.errors[i][0]
                        });
                    }
                } else {
                    Toast.fire({
                        icon: "error",
                        title: "Something went wrong"
                    });
                }
            }
        },

        async updateUser() {
            console.log("Editing...");
            const res = await this.callApi(
                "post",
                "api/edit_user",
                this.editData
            );
            if (res.status === 200) {
                this.users[this.index] = this.editData;
                Toast.fire({
                    icon: "success",
                    title: "User Updated Successfully"
                });
                this.dialog = false;
                // this.editData.name = "";
                // this.editData.email = "";
                // this.editData.password = "";
                // this.editData.lastName = "";
            } else {
                if (res.status == 422) {
                    console.log(res.data.errors);
                    for (let i in res.data.errors) {
                        Toast.fire({
                            icon: "error",
                            title: res.data.errors[i][0]
                        });
                        // this.e(res.data.errors[i][0])
                    }
                } else {
                    Toast.fire({
                        icon: "error",
                        title: "Something Went wrong"
                    });
                }
            }
        },

        async deleteUser(user, i) {
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
                    this.callApi("post", "api/delete_user", user).then(() => {
                        Swal.fire(
                            "Deleted!",
                            "User has been deleted Successfully.",
                            "success"
                        ),
                            this.users.splice(i, 1);
                    });
                }
            });
        }
    },
    computed: {},
    async created() {
        const res = await this.callApi("get", "api/get_users", {
            name: "name"
        });
        if (res.status == 200) {
            this.users = res.data;
        } else {
            Toast.fire({
                icon: "error",
                title: "Something went wrong"
            });
        }
    }
};
</script>
