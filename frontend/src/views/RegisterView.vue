<script setup lang="ts">
import { Form, Field, ErrorMessage } from "vee-validate";
import * as yup from "yup";

const schema = yup.object({
  fullname: yup.string().required("Nama lengkap tidak boleh kosong"),
  username: yup
    .string()
    .required("Username tidak boleh kosong")
    .min(3, "Username minimal 3 karakter")
    .max(20, "Username maksimal 20 karakter")
    .matches(
      /^[a-zA-Z0-9._]+$/,
      "Username hanya boleh mengandung huruf, angka, dan underscore"
    ),
  bio: yup
    .string()
    .required("Bio tidak boleh kosong")
    .max(100, "Bio maksimal 100 karakter"),
  password: yup
    .string()
    .required("Password tidak boleh kosong")
    .min(6, "Password minimal 6 karakter"),
  isPrivate: yup.boolean(),
});

const onSubmit = (values) => {
  console.log(values);
};
</script>

<template>
  <body class="register-page bg-body-secondary">
    <div class="register-box">
      <div class="card card-outline card-primary">
        <div
          class="card-header d-flex justify-content-center align-items-center"
        >
          <p class="m-0 fs-2 fw-semibold">Facegram</p>
        </div>
        <div class="card-body register-card-body">
          <Form
            @submit="onSubmit"
            :validation-schema="schema"
            class="vstack gap-2"
          >
            <Field
              name="fullname"
              as="input"
              class="form-control"
              placeholder="Nama Lengkap"
            />
            <ErrorMessage name="fullname" class="text-danger" />
            <Field
              name="username"
              as="input"
              class="form-control"
              placeholder="Username"
            />
            <ErrorMessage name="username" class="text-danger" />
            <Field
              name="bio"
              as="textarea"
              class="form-control"
              placeholder="Bio"
            />
            <ErrorMessage name="bio" class="text-danger" />
            <Field
              name="password"
              as="input"
              class="form-control"
              placeholder="Password"
            />
            <ErrorMessage name="password" class="text-danger" />
            <Field
              v-slot="{ field }"
              name="isPrivate"
              type="checkbox"
              :value="true"
              :unchecked-value="false"
            >
              <label>
                <input
                  type="checkbox"
                  name="terms"
                  v-bind="field"
                  :value="true"
                />
                Akun private?
              </label></Field
            >
            <button class="btn btn-primary">Register</button>
          </Form>
        </div>
      </div>
    </div>
  </body>
</template>
