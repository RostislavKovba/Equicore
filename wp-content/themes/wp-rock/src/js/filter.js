/* eslint-disable */
/**
 * Posts Filter
 */

class Filter {
    constructor(block) {
        this.form = block.querySelector('.js-filters-form');

        this.autoSubmit = this.form.querySelector("input[name='auto_submit']");
        this.pagedInput = this.form.querySelector("input[name='paged']");
        this.taxonomiesInputs = this.form.querySelectorAll(
            "input[name='taxonomies[]']"
        );
        this.orderbySelect = block.querySelector("[name='orderby']");

        this.filterBtns = this.form.querySelectorAll('.js-filter-item input');
        this.allBtn = this.form.querySelector('.js-all-filter input');

        this.postWrap = block.querySelector('.js-posts-list');
        this.loadMoreWrap = block.querySelector('.js-load-more');
        this.preloaderWrap = block.querySelector('.js-preloader');
        this.preloader = '<div class="preloader"><div></div><div></div></div>';

        this.filterSidebar = block.querySelector('.js-filter');
        this.openFilterBtn = block.querySelector('.js-filter-open');
        this.closeFilterBtn = block.querySelector('.js-filter-close');
    }

    initFilter() {
        console.log('filter init')
        this.showFilteredPosts();
        this.toggleFilterAllBtn();
        // this.initToggleFilterBtn();
        this.initSubmitFilterForm();

        this.form.addEventListener('submit', (e) => {
            this.handleSubmit(e);
        });
    }

    async ajaxRecieveData(action) {
        if (!action) return;

        let formData = new FormData(this.form);
        formData.append('action', action);

        const response = await fetch(var_from_php.ajax_url, {
            method: 'POST',
            body: formData,
        });

        const json = await response.json();

        return json;
    }

    async showFilteredPosts(loadmore = false) {
        try {
            // console.log('postFiltering');

            this.hideLoadMoreBtn();
            this.preloaderLoading('start', loadmore);

            const json = await this.ajaxRecieveData('filtering');

            this.preloaderLoading('end', loadmore);

            // Output data
            if (!loadmore) {
                this.postWrap.innerHTML = json.html;
            } else {
                this.postWrap.insertAdjacentHTML('beforeend', json.html);
            }

            // this.addParamsToUrl();
            this.showLoadMoreBtn();
            const event = new Event('customFilterUpdated');
            document.dispatchEvent(event);
        } catch (error) {
            console.error('Failed filtering posts:', error);
        }
    }

    async showLoadMoreBtn() {
        try {
            // console.log('show loadMore btn');

            // Output data
            const json = await this.ajaxRecieveData('load_more');
            this.loadMoreWrap.innerHTML = json.html;

            const loadMoreBtn =
                this.loadMoreWrap.querySelector('.load-more__btn');
            if (!loadMoreBtn) return;

            loadMoreBtn.addEventListener('click', () => {
                this.loadMorePosts();
            });
        } catch (error) {
            console.error('Failed to show load-more button:', error);
        }
    }

    async loadMorePosts() {
        // console.log('loading more posts');
        // Increment page
        this.pagedInput.value++;
        try {
            this.hideLoadMoreBtn();

            await this.showFilteredPosts(true);
        } catch (error) {
            console.error('Failed loading more posts:', error);
        }
    }

    hideLoadMoreBtn() {
        const loadMoreBtn = this.loadMoreWrap.querySelector('.load-more__btn');
        if (!loadMoreBtn) return;
        loadMoreBtn.classList.add('d-none');
    }

    preloaderLoading(position, loadmore) {
        this.hideLoadMoreBtn();
        if (position == 'start') {
            !loadmore
                ? (this.postWrap.innerHTML = this.preloader)
                : this.postWrap.insertAdjacentHTML('beforeend', this.preloader);
        }

        if (position == 'end') {
            this.postWrap.querySelector('.preloader')?.remove();
        }
    }

    addParamsToUrl() {
        let searchData = {};
        // Get taxonomies names from hidden inputs
        const taxonomies = Array.from(this.taxonomiesInputs).map(
            (taxonomyInput) => taxonomyInput.value
        );

        taxonomies.forEach((taxonomy) => {
            const taxonomyField = this.form.querySelector(
                `[name='${taxonomy}[]']`
            );
            let terms = taxonomyField.value;

            if (taxonomyField.tagName == 'INPUT') {
                const activeFilters = this.form.querySelectorAll(
                    `[name='${taxonomy}[]']:checked`
                );
                // Get active filters to array and joins them to string
                terms = Array.from(activeFilters)
                    .map((input) => input.value)
                    .join(',');
            }

            if (!terms || terms == 'all') return;

            searchData[taxonomy] = terms;
        });

        if (this.orderbySelect) {
            searchData['order'] = this.orderbySelect?.value;
        }

        const searchParams = new URLSearchParams(searchData);

        window.history.replaceState(
            '',
            '',
            searchParams.size
                ? `?${searchParams.toString()}`
                : window.location.pathname
        );
    }

    toggleFilterAllBtn() {
        if (!this.allBtn) return;
        // Clicking on "All" filter button unchecked all other filters
        this.allBtn.addEventListener('click', (e) => {
            if (!e.target.checked) {
                e.preventDefault();
                return;
            }

            this.filterBtns.forEach((filter) => (filter.checked = false));
        });
        // Clicking on any other than "All" filter button toggled "All" filter item
        this.filterBtns.forEach((filter) => {
            let hasChecked = false;
            filter.addEventListener('click', () => {
                this.allBtn.checked = !this.hasCheckedFilters();
            });
        });
    }

    hasCheckedFilters() {
        let hasChecked = false;
        this.filterBtns.forEach((filter) => {
            if (filter.checked == true) {
                hasChecked = true;
                return;
            }
        });

        return hasChecked;
    }

    handleSubmit(e) {
        e.preventDefault();
        this.pagedInput.value = 1;
        this.showFilteredPosts();
    }

    initSubmitFilterForm() {
        this.orderbySelect?.addEventListener('change', () => {
            this.form.dispatchEvent(new Event('submit', {}));
        });

        if (!this.autoSubmit) return;

        this.form?.addEventListener('change', () => {
            this.form.dispatchEvent(new Event('submit', {}));
        });
    }

    initToggleFilterBtn() {
        // if (window.innerWidth >= 768) return;

        this.openFilterBtn?.addEventListener('click', () => {
            this.filterSidebar.classList.add('opened');
            document.body.classList.add('popup-opened');
        });

        this.closeFilterBtn?.addEventListener('click', () => {
            this.filterSidebar.classList.remove('opened');
            document.body.classList.remove('popup-opened');
        });
    }
}

const block = document.querySelector('.block-events');
if (block) {
    const filter = new Filter(block);
    filter.initFilter();
}


