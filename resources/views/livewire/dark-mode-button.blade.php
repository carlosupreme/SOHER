<button
    x-init="(localStorage.getItem('theme') === 'dark') && document.documentElement.classList.add('dark')"
    x-data="{
    toggle: () => {
        if (localStorage.getItem('theme') === 'dark') {
            localStorage.setItem('theme','light');
            document.documentElement.classList.remove('dark');
        } else {
            localStorage.setItem('theme','dark');
            document.documentElement.classList.add('dark');
        }
    }
}" @click="toggle">
    <img src="/assets/img/codehouse-logo.svg" alt="Code House" class="block h-9 w-auto">
</button>
