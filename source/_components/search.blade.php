<div class="flex flex-1 justify-end items-center text-right px-4">
        <div
            class="hidden md:flex absolute md:relative w-full justify-end bg-white pin-l pin-t z-10 mt-7 md:mt-0 px-4 md:px-0"
            :class="{'': ! searching}"
        >
            <label for="search" class="hidden">Search</label>

            <input
                id="search-input"
                v-model="query"
                ref="search"
                class="search-input transition-fast relative block h-10 w-full lg:w-1/2 lg:focus:w-3/4 bg-grey-lightest border border-grey focus:border-blue-light outline-none cursor-pointer text-grey-darker px-4 pb-0"
                :class="{ 'transition-border': query }"
                autocomplete="off"
                name="search"
                placeholder="Search"
                type="text"
                onkeyup="fuseSearch.search"
                @keyup.esc="reset"
                @blur="reset"
            >

            <button
                v-if="query || searching"
                class="hidden absolute pin-t pin-r h-10 font-light text-3xl text-blue hover:text-blue-dark focus:outline-none -mt-px pr-7 md:pr-3"
                @click="reset"
            >&times;</button>

            <transition name="fade">
                <div v-if="query" class="hidden absolute pin-l pin-r md:pin-none w-full lg:w-3/4 text-left mb-4 md:mt-10">
                    <div class="flex flex-col bg-white border border-b-0 border-t-0 border-blue-light rounded-b-lg shadow-lg mx-4 md:mx-0">
                        <a
                            v-for="(result, index) in results"
                            class="bg-white hover:bg-blue-lightest border-b border-blue-light text-xl cursor-pointer p-4"
                            :class="{ 'rounded-b-lg' : (index === results.length - 1) }"
                            :href="result.link"
                            :title="result.title"
                            :key="result.link"
                            @mousedown.prevent
                        >
                            <!-- {{ result.title }} -->

                            <span class="block font-normal text-grey-darker text-sm my-1" v-html="result.snippet"></span>
                        </a>

                        <div
                            v-if="! results.length"
                            class="bg-white w-full hover:bg-blue-lightest border-b border-blue-light rounded-b-lg shadow cursor-pointer p-4"
                        >
                            <p class="my-0">No results for <strong>query</strong></p>
                        </div>
                    </div>
                </div>
            </transition>
        </div>

        <button
            title="Start searching"
            type="button"
            class="flex md:hidden bg-grey-lightest hover:bg-blue-lightest justify-center items-center border border-grey rounded-full focus:outline-none h-10 px-3"
            @click.prevent="showInput"
        >
            <img src="/assets/img/magnifying-glass.svg" alt="search icon" class="h-4 w-4 max-w-none">
        </button>
    </div>
