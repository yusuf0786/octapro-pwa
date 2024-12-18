$(function(){
    const preloader = document.getElementById('preloader')
    if(preloader){
        preloader.classList.remove('loader-hide')
        preloader.classList.add('loader-show')
    }
    
    setTimeout(() => {
        
        const pageOrigin = window.location.origin;
        let fetchChartsDataApi = ''
        switch (pageOrigin) {
            case 'http://localhost':
                fetchChartsDataApi = (date) => `${pageOrigin}:3000/api/app/getrcd//tech-services/dashboard.php?getdashboardrcd=true&filter=${date}`
            break;
            case 'https://fielddesk.in':
                fetchChartsDataApi = (date) => `${pageOrigin}/app/getrcd/tech-services/dashboard.php?getdashboardrcd=true&filter=${date}`
            break;
        }

        if(preloader){
            preloader.classList.remove('loader-show')
            preloader.classList.add('loader-hide')
        }

    }, 500);
})