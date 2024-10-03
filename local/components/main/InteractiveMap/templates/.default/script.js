document.addEventListener("DOMContentLoaded", () => {

    var e = document.querySelector('[data-a-map="main"]');
    var o = document.querySelector(".header");
    if (e) {
        var t = e.querySelector('[data-a-map="bar"]'),
            i = e.querySelectorAll('[data-a-map="projects"]');
        i.forEach((function(t) {
            t.addEventListener("click", (function() {

                var dataId = t.getAttribute("data-id");
                if (dataId){
                    BX.ajax.runComponentAction('main:InteractiveMap',
                        'sendFormMap', {
                            mode: 'class',
                            data: {mapPosition:dataId},
                        })
                        .then(function (response) {

                            console.log(response.data);

                            var div = e.querySelector('[data-a-map="bar"]'),
                                title = div.querySelector('.a-map__bar-title'),
                                list = div.querySelector('.a-map__bar-projects');

                            if (response.data.title){
                                title.innerHTML = response.data.title;
                            } else {
                                title.innerHTML = 'Проекты в мире';
                            }

                            if (response.data.list){
                                list.innerHTML = '';
                                response.data.list.forEach((element)=>{
                                    var divElement = '<div class="a-map__project-card">\n' +
                                        '    <h4 class="title title--h4 a-map__project-card-title">'+element.name+'</h4>\n' +
                                        '    <ul class="a-map__project-card-info list-reset">\n';
                                    if (element.country){
                                        divElement += '<li>Страна · '+element.country+'</li>\n';
                                    }
                                    if (element.count){
                                        divElement += '<li>Кол-во линий · '+element.count+'</li>\n';
                                    }
                                    if (element.capacity){
                                        divElement += '<li>Производительность (шт/час) · '+element.capacity+'</li>\n';
                                    }
                                    if (element.status){
                                        divElement += '<li>Статус проекта · '+element.status+'</li>\n';
                                    }
                                    divElement += '    </ul>\n';
                                    if (element.category){
                                        divElement += '    <span class="a-map__project-card-label">'+element.category+'</span>\n';
                                    }
                                    divElement +=  '</div>';
                                    list.insertAdjacentHTML('beforeend', divElement);
                                });
                            } else {
                                list.innerHTML = '';
                            }

                            return e.classList.add("active"), o && o.classList.add("invisible"), void setTimeout((function() {
                                document.body.style.overflow = "hidden hidden"
                            }))
                        }, function (response) {
                            //console.log(response);
                        });
                }

            }))
        }))
    }

});