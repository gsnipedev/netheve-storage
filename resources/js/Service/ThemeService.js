export class ThemeService {

    static currentTheme() {
        return localStorage.getItem('active-theme')
    }

    static changeTheme() {
        const activeTheme = localStorage.getItem('active-theme')

        if (activeTheme == null) {
            document.documentElement.classList.toggle('dark')
            localStorage.setItem('active-theme', 'dark')
            return
        }

        if (activeTheme === 'dark') {
            localStorage.setItem('active-theme', 'light')
            document.documentElement.classList.toggle('dark', false)
        } else {
            localStorage.setItem('active-theme', 'dark')
            document.documentElement.classList.toggle('dark', true)
        }
    }

    static loadTheme() {
        const activeTheme = localStorage.getItem('active-theme')

        if (activeTheme === 'dark') {
            document.documentElement.classList.toggle('dark', true)
        } else {
            localStorage.setItem('active-theme', 'light')
            document.documentElement.classList.toggle('dark', false)
        }
    }
}
