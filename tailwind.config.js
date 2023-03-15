/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
      container: {
          padding: {
              DEFAULT: "15rem",
          },
      },
      colors: {
          white: "#FFFFFF",
          "black-color": "#010314",
          "white-color": "#f5f5f5",
          "light-gray": "#E2E3E9",
          "dark-gray": "#707070",
          "title-color": "#3F3D56",
          "paragraph-color": "#BFB8C2",
          "input-color": "#DFE1F4",
          "red-color": "#F43F5E",
          "green-color": "#C5F8B7",
          "blue-color": "#38BDF8",
          "yellow-color": "#FCD34D",
      },
      fontSize: {
          title: "3.563rem",
          "2xl": "1.5rem",
      },
      extend: {
          height: {
              156: "43.563rem",
          },
      },
  },
  plugins: [],
};