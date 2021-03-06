<main class="blog-content row d-flex flex-column justify-content-between my-5">
  <section class="text-editor-container container d-flex flex-column">
    <div class="text-editor-row row pb-0">


      <form method="post" action="<?= $tpl->basePath; ?>/admin/post/edit/update?id=<?= $tpl->viewVars['post']->getId_post(); ?>" class="text-editor-form container p-0">
        <div class="editor-row">
          <textarea id="title-post-editor" name="title">
            <?= $tpl->viewVars['post']->getTitle(); ?>
          </textarea>
          <textarea id="content-post-editor" name="content">
            <?= $tpl->viewVars['post']->getPostContent(); ?>
          </textarea>
        </div>
        <div class="buttons-row row d-flex justify-content-around mt-3 mb-0">
          <button type="submit" class="update-post btn btn-success btn-lg" name="updatePost">Mettre à jour</button>
        </div>
      </form>
    </div>
  </section>
</main>