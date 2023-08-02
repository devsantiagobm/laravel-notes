export const $ = name => {
    const elements = document.querySelectorAll(name)

    return elements.length > 1 ? elements : elements[0]
}