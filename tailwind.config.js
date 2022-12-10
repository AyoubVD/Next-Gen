/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/FeedPlaceHolder.php'],
  theme: {
    screens: {
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
      '2xl': '1536px',
    }, 
    extend: {
      colors: {
        'primary': '#0D6EFD',
        'secondary': '#3B82F6',
        'tertiary': '#6B46C1',
        'quaternary': '#F59E0B',
        'quinary': '#10B981',
        'senary': '#EF4444',
        'septenary': '#6B7280',
        'octonary': '#F3F4F6',
        'nonary': '#111827',
        'denary': '#374151',
        'undenary': '#4B5563',
        'duodenary': '#9CA3AF',
        'treddenary': '#E5E7EB',
        'purple': '#6B46C1',
        'lightpurple': '#A78BFA',
        'darkpurple': '#4338CA',
        'lightgray': '#F3F4F6',
        'darkgray': '#374151',
        'lightblue': '#93C5FD',
        'darkblue': '#2563EB',
        'gray': '#9CA3AF'
    },
  },
  plugins: [],

}
